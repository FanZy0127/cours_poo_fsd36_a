<?php

use App\User;
use App\FactoryPDO;
use App\EventManager;

use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    protected User $user;
    protected EventManager $eventManager;

    public function setUp(): void
    {
        $m = new Migration();
        $pdo = FactoryPDO::buildSqlite("sqlite:" . __DIR__ . "/_data/database.db");
        $m->setData($pdo);

        $this->user = new User("sqlite:" . __DIR__ . "/_data/database.db");

        $this->eventManager = new EventManager();
    }

    public function testFirstUser()
    {
        $user = $this->user->find(1);

        $this->assertEquals($user->getId(), 1);
        $this->assertEquals($user->address, "Paris");
    }

    public function testAllUsers()
    {
        $users = $this->user->all();

        $this->assertEquals(count($users), 30);
    }

    public function testEventManager(){

        $this->assertInstanceOf(EventManager::class, $this->eventManager);
    }

    public function testEventTriggerConnect(){

        // Container de service 
        $this->eventManager->attach('database.user.connect', function(User $user){
            $user->setHistoryCount( $user->getHistoryCount() + 1 );

            $user->persist();
        });


        // SIMULATION DE LA CONNEXION on compte 1 connexion
        $user = $this->user->find(1);
        $this->eventManager->trigger('database.user.connect', $user); // propagation des events
        
        $userVerif = $this->user->find(1) ;
        $this->assertEquals($userVerif ->getHistoryCount(), 1);
    }
}

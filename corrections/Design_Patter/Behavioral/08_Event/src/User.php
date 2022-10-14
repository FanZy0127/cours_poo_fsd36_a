<?php
namespace App;

class User
{
    protected $pdo = null;

    protected $id;
    protected $email;
    protected $history_count;
    protected $dsn ;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;

        $this->pdo = FactoryPDO::buildSqlite($dsn);
    }

    public function getId(){
     return $this->id;
    }

    public function getHistoryCount(){
        return $this->history_count;
    }

    public function setHistoryCount(int $count){
        $this->history_count = $count;
    }

    public function find(int $id){

        $prepare = $this->pdo->prepare('SELECT * FROM users WHERE id=?');

        $prepare->bindValue(1, $id);
        $prepare->execute();

        return $prepare->fetchObject(User::class, [$this->dsn]);
    }

    public function all(){
        $prepare = $this->pdo->prepare('SELECT * FROM users');
        $prepare->execute();
        return $prepare->fetchAll(\PDO::FETCH_CLASS);
    }

    public function persist():void{

        $prepare = $this->pdo->prepare('UPDATE users SET history_count = ? WHERE id = ?');

        $prepare->bindValue(1, $this->getHistoryCount());

        $prepare->bindValue(2, $this->id);
        $prepare->execute();
    }
}
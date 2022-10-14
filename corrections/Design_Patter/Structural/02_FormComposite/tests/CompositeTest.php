<?php

use App\Form;
use App\Input;
use App\Wrapper;

use PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase
{
    protected Form $form;
    protected Wrapper $wrapper;

    public function setUp():void{

        $this->form = new Form(name: 'user', action: '/add');
        $this->wrapper = new Wrapper();
    }

    public function testFormComposite(){
        $this->form->add(new Input(name: 'username', type: 'text'));
        $this->form->add(new Input(name: 'username', type: 'text'));

        $this->wrapper->add($this->form);

        $this->assertEquals((string) $this->wrapper, '<div class="wrapper-content"><form name="user" action="/add"><input type="text" name="username" value=""/><input type="text" name="username" value=""/></form></div>');
    }

}
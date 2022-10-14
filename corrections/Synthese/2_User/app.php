<?php

class User {
  
    public function __construct(private string $name, private int $age){

    }
}

class UserRepository
{

    public function store(User $user)
    {
        // Store the user into a database...
    }
}

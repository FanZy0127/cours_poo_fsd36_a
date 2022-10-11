<?php

class Book
{
  public function getTitle()
  {
        return 'Clean Code';
    }
    
    public function getAuthor()
    {
        return 'Uncle Bob';
    }
    

}

class BookStorage
{
    public function save($book)
    {
        return 'saving '. $book .'to local databse';
    }
}


$book = new Book;
$bookStorage = new BookStorage;

$bookStorage->save('some');
<?php

interface Sleepable
{
   public function sleep();
}
interface Eatable
{
  public function eat();
}
interface Workable
{
   public function work();
}

class Human implements Workable, Eatable, Sleepable
{
    public function sleep()
    {
        return true;
    }
    
    public function eat()
    {
        return true;
    }
    public function work()
    {
        return true;
     }
}

class Android implements Workable
{
    public function work()
    {
        return true;
     }
}
<?php

namespace App\Model;

class Person{

    public function __construct(
        private string $name,
        private int $id,
        private array $relation = [],
        )
    {
        
    }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of relation
         */ 
        public function getRelation()
        {
                return $this->relation;
        }

        /**
         * Set the value of relation
         *
         * @return  self
         */ 
        public function setRelation($relationId)
        {
                $this->relation[] = $relationId;

                return $this;
        }
}
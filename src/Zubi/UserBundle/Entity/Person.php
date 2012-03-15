<?php

namespace Zubi\UserBundle\Entity;

class Person
{
	protected $id;

    protected $name;
    
    protected $surname;


    public function getid()
    {
        return $this->id;
    }
    
    public function setId($email)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

}
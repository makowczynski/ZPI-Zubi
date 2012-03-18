<?php

namespace Zubi\UserBundle\Entity;

class Status
{

	protected $id;

	protected $name;

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

}
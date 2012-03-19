<?php

namespace Zubi\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Status
{


    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nazwa
     */
    private $nazwa;

    /**
     * @var Zubi\UserBundle\Entity\User
     */
    private $users;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nazwa
     *
     * @param string $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Add users
     *
     * @param Zubi\UserBundle\Entity\User $users
     */
    public function addUser(\Zubi\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
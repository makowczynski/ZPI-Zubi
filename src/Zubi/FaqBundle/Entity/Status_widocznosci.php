<?php

namespace Zubi\FaqBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


class Status_widocznosci {
    //put your code here
    
    protected $id;
    protected $nazwa;

    protected $faqs;
    
     public function __construct() {
         $this->faqs = new ArrayCollection();
     }
    /**
     * @var integer $oneToMany
     */
    private $oneToMany;


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
     * Set oneToMany
     *
     * @param integer $oneToMany
     */
    public function setOneToMany($oneToMany)
    {
        $this->oneToMany = $oneToMany;
    }

    /**
     * Get oneToMany
     *
     * @return integer 
     */
    public function getOneToMany()
    {
        return $this->oneToMany;
    }
}
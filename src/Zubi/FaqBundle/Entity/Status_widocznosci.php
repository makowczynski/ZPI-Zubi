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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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
  
    /**
     * Add faqs
     *
     * @param Zubi\FaqBundle\Entity\Faq $faqs
     */
    public function addFaq(\Zubi\FaqBundle\Entity\Faq $faqs)
    {
        $this->faqs[] = $faqs;
    }

    /**
     * Get faqs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFaqs()
    {
        return $this->faqs;
    }
    
    public function __toString() {
        return $this->nazwa;
    }
    
}
<?php

namespace Zubi\FaqBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="faq")
 */
class Faq {
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $tresc;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $odpowiedz;
    
    /**
     * @ORM\Column(type="integer", length=10)
     */
    protected $id_statusu;
    
    

 

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
     * Set tresc
     *
     * @param string $tresc
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;
    }

    /**
     * Get tresc
     *
     * @return string 
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * Set odpowiedz
     *
     * @param text $odpowiedz
     */
    public function setOdpowiedz($odpowiedz)
    {
        $this->odpowiedz = $odpowiedz;
    }

    /**
     * Get odpowiedz
     *
     * @return text 
     */
    public function getOdpowiedz()
    {
        return $this->odpowiedz;
    }

    /**
     * Set id_statusu
     *
     * @param integer $idStatusu
     */
    public function setIdStatusu($idStatusu)
    {
        $this->id_statusu = $idStatusu;
    }

    /**
     * Get id_statusu
     *
     * @return integer 
     */
    public function getIdStatusu()
    {
        return $this->id_statusu;
    }
    
  
}
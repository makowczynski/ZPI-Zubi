<?php

namespace Zubi\FaqBundle\Entity;

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
    protected $statusu;
    
    

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
     * Set statusu
     *
     * @param integer $statusu
     */
    public function setStatusu($statusu)
    {
        $this->statusu = $statusu;
    }

    /**
     * Get statusu
     *
     * @return integer 
     */
    public function getStatusu()
    {
        return $this->statusu;
    }
}
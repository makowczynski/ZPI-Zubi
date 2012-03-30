<?php

namespace Zubi\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

  
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $haslo
     */
    private $haslo;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var integer $id_osoby
     */
    private $id_osoby;

    /**
     * @var integer $osoba_prezentacja
     */
    private $osoba_prezentacja;

    /**
     * @var string $kraj
     */
    private $kraj;

    /**
     * @var integer $kraj_prezentacja
     */
    private $kraj_prezentacja;

    /**
     * @var string $miasto
     */
    private $miasto;

    /**
     * @var integer $miasto_prezentacja
     */
    private $miasto_prezentacja;

    /**
     * @var date $data_ur
     */
    private $data_ur;

    /**
     * @var integer $data_ur_prezentacja
     */
    private $data_ur_prezentacja;

    /**
     * @var Zubi\UserBundle\Entity\Status
     */
    private $id_status;

    private $salt;


    public function __construct()
    {
        $this->isActive = true;
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
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
     * Set haslo
     *
     * @param string $haslo
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;
    }

    /**
     * Get haslo
     *
     * @return string 
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set id_osoby
     *
     * @param integer $idOsoby
     */
    public function setIdOsoby($idOsoby)
    {
        $this->id_osoby = $idOsoby;
    }   

    /**
     * Get id_osoby
     *
     * @return integer 
     */
    public function getIdOsoby()
    {
        return $this->id_osoby;
    }

    /**
     * Set osoba_prezentacja
     *
     * @param integer $osobaPrezentacja
     */
    public function setOsobaPrezentacja($osobaPrezentacja)
    {
        $this->osoba_prezentacja = $osobaPrezentacja;
    }

    /**
     * Get osoba_prezentacja
     *
     * @return integer 
     */
    public function getOsobaPrezentacja()
    {
        return $this->osoba_prezentacja;
    }

    /**
     * Set kraj
     *
     * @param string $kraj
     */
    public function setKraj($kraj)
    {
        $this->kraj = $kraj;
    }

    /**
     * Get kraj
     *
     * @return string 
     */
    public function getKraj()
    {
        return $this->kraj;
    }

    /**
     * Set kraj_prezentacja
     *
     * @param integer $krajPrezentacja
     */
    public function setKrajPrezentacja($krajPrezentacja)
    {
        $this->kraj_prezentacja = $krajPrezentacja;
    }

    /**
     * Get kraj_prezentacja
     *
     * @return integer 
     */
    public function getKrajPrezentacja()
    {
        return $this->kraj_prezentacja;
    }

    /**
     * Set miasto
     *
     * @param string $miasto
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;
    }

    /**
     * Get miasto
     *
     * @return string 
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set miasto_prezentacja
     *
     * @param integer $miastoPrezentacja
     */
    public function setMiastoPrezentacja($miastoPrezentacja)
    {
        $this->miasto_prezentacja = $miastoPrezentacja;
    }

    /**
     * Get miasto_prezentacja
     *
     * @return integer 
     */
    public function getMiastoPrezentacja()
    {
        return $this->miasto_prezentacja;
    }

    /**
     * Set data_ur
     *
     * @param date $dataUr
     */
    public function setData_Ur($dataUr)
    {
        $this->data_ur = $dataUr;
    }

    /**
     * Get data_ur
     *
     * @return date 
     */
    public function getData_Ur()
    {
        return $this->data_ur;
    }

        /**
     * Set data_ur
     *
     * @param date $dataUr
     */
    public function setDataUr($dataUr)
    {
        $this->data_ur = $dataUr;
    }

    /**
     * Get data_ur
     *
     * @return date 
     */
    public function getDataUr()
    {
        return $this->data_ur;
    }

    /**
     * Set data_ur_prezentacja
     *
     * @param integer $dataUrPrezentacja
     */
    public function setData_UrPrezentacja($dataUrPrezentacja)
    {
        $this->data_ur_prezentacja = $dataUrPrezentacja;
    }

    /**
     * Get data_ur_prezentacja
     *
     * @return integer 
     */
    public function getData_UrPrezentacja()
    {
        return $this->data_ur_prezentacja;
    }

    /**
     * Set data_ur_prezentacja
     *
     * @param integer $dataUrPrezentacja
     */
    public function setDataUrPrezentacja($dataUrPrezentacja)
    {
        $this->data_ur_prezentacja = $dataUrPrezentacja;
    }

    /**
     * Get data_ur_prezentacja
     *
     * @return integer 
     */
    public function getDataUrPrezentacja()
    {
        return $this->data_ur_prezentacja;
    }

    /**
     * Set id_status
     *
     * @param Zubi\UserBundle\Entity\Status $idStatus
     */
    public function setIdStatus(\Zubi\UserBundle\Entity\Status $idStatus)
    {
        $this->id_status = $idStatus;
    }

    /**
     * Get id_status
     *
     * @return Zubi\UserBundle\Entity\Status 
     */
    public function getIdStatus()
    {
        return $this->id_status;
    }


    // do obsługi logowania:

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->email;
    }

    public function eraseCredentials()
    {
    }


    public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getPassword()
    {
        return $this->haslo;
    }


}
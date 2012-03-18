<?php

namespace Zubi\UserBundle\Entity;

class User
{

    protected $id;

    protected $email;

    protected $pass;
    
    protected $country;
    
    protected $city;
    
    protected $date_birth;

    protected $namepriv;
    
    protected $countrypriv;
    
    protected $citypriv;
    
    protected $date_birthpriv;


    public function getId()
    {
        return $this->id;
    }

    public function setId($email)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPass() 
    {
        return $this->pass;
    }

    public function setPass($pass) 
    {
        $this->pass = $pass;
    }

    public function getCountry() 
    {
        return $this->country;
    }

    public function setCountry($country) 
    {
        $this->country = $country;
    }

    public function getCity() 
    {
        return $this->city;
    }

    public function setCity($city) 
    {
        $this->city = $city;
    }

    public function getDateBirth() 
    {
        return $this->date_birth;
    }

    public function setDateBirth($date_birth) 
    {
        $this->date_birth = $date_birth;
    }

    public function isNamepriv()
    {
        return $this->namepriv;
    }
   
    public function isCountrypriv() 
    {
        return $this->countrypriv;
    }
 
    public function isCitypriv() 
    {
        return $this->citypriv;
    }

    public function isDateBirthpriv() 
    {
        return $this->date_birthpriv;
    }


}
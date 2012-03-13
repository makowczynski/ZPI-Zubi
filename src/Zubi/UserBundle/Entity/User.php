<?php

namespace Zubi\UserBundle\Entity;

class User
{
    
    protected $login;

    protected $email;

    protected $pass;
    
    protected $name;
    
    protected $surname;
    
    protected $country;
    
    protected $city;
    
    protected $date_birth;

    protected $namepriv;
    
    protected $surnamepriv;
    
    protected $countrypriv;
    
    protected $citypriv;
    
    protected $date_birthpriv;



    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getDateBirth() {
        return $this->date_birth;
    }

    public function setDateBirth($date_birth) {
        $this->date_birth = $date_birth;
    }

    public function isNamepriv()
    {
        return $this->namepriv;
    }
 

    public function isSurnamepriv() {
        return $this->surnamepriv;
    }

   
    public function isCountrypriv() {
        return $this->countrypriv;
    }

   
    public function isCitypriv() {
        return $this->citypriv;
    }


    public function isDateBirthpriv() {
        return $this->date_birthpriv;
    }


}
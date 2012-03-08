<?php

namespace Zubi\ProfileBundle\Entity;

class Prywata
{
    
    protected $namepriv;
    
    protected $surnamepriv;
    
    protected $countrypriv;
    
    protected $citypriv;
    
    protected $date_birthpriv;



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
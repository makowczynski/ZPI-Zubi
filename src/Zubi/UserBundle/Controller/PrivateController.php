<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class PrivateController extends Controller
{
    
    
    public function privateAction() {
        
        $prywata = new User();
        
        $form = $this->createFormBuilder($prywata)
                ->add('namepriv', 'checkbox', array('label' => 'Ukryć Imię?'))
                ->add('surnamepriv', 'checkbox', array('label' => 'Ukryć Nazwisko?'))
                ->add('countrypriv', 'checkbox', array('label' => 'Ukryć Kraj?'))
                ->add('citypriv', 'checkbox', array('label' => 'Ukryć Miasto?'))
                ->add('date_birthpriv', 'checkbox', array('label' => 'Ukryć Wiek?'))
                ->getForm();
        
        return $this->render('ZubiUserBundle:Default:private.html.twig', 
                array('form' => $form->createView()));
    }
}

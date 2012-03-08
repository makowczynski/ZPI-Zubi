<?php

namespace Zubi\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\ProfileBundle\Entity\Prywata;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ZubiProfileBundle:Default:index.html.twig');
    }
    
    
    public function privateAction() {
        
        $prywata = new Prywata();
        
        $form = $this->createFormBuilder($prywata)
                ->add('namepriv', 'checkbox', array('label' => 'Ukryć Imię?'))
                ->add('surnamepriv', 'checkbox', array('label' => 'Ukryć Nazwisko?'))
                ->add('countrypriv', 'checkbox', array('label' => 'Ukryć Kraj?'))
                ->add('citypriv', 'checkbox', array('label' => 'Ukryć Miasto?'))
                ->add('date_birthpriv', 'checkbox', array('label' => 'Ukryć Wiek?'))
                ->getForm();
        
        return $this->render('ZubiProfileBundle:Default:private.html.twig', 
                array('form' => $form->createView()));
    }
}

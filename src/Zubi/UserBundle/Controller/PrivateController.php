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
                ->add('osoba_prezentacja', 'checkbox', array('label' => 'Ukryć Imię?'))
                ->add('kraj_prezentacja', 'checkbox', array('label' => 'Ukryć Kraj?'))
                ->add('miasto_prezentacja', 'checkbox', array('label' => 'Ukryć Miasto?'))
                ->add('data_ur_prezentacja', 'checkbox', array('label' => 'Ukryć Wiek?'))
                ->getForm();
        
        return $this->render('ZubiUserBundle:Default:private.html.twig', 
                array('form' => $form->createView()));
    }
}

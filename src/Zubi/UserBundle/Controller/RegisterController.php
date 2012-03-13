<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class RegisterController extends Controller
{
    
    public function registerAction(Request $request)
    {
        $user = new User();

        
        $form = $this->createFormBuilder($user)
                ->add('login', 'text', array('label' => 'Login'))
                ->add('email', 'email', array('label' => 'E-mail'))
                ->add('pass', 'password', array('label' => 'Hasło'))
                ->add('name', 'text', array('label' => 'Imię'))
                ->add('surname', 'text', array('label' => 'Nazwisko'))
                ->add('country', 'text', array('label' => 'Kraj'))
                ->add('city', 'text', array('label' => 'Miasto'))
                ->add('date_birth', 'date', array('widget' => 'single_text', 'label' => 'Data urodzenia'))
                ->getForm();
        
        
        return $this->render('ZubiUserBundle:Default:register.html.twig', 
                array('form' => $form->createView()));
    }
}
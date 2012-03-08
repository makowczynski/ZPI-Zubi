<?php

namespace Zubi\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\RegisterBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
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
        
        
        return $this->render('ZubiRegisterBundle:Default:index.html.twig', 
                array('form' => $form->createView()));
    }
}

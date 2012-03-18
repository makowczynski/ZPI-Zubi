<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    
    public function loginAction()
    {
        $user = new User();

        
        $form = $this->createFormBuilder($user)
                ->add('login', 'text', array('label' => 'E-mail'))
                ->add('pass', 'password', array('label' => 'Hasło'))
                ->getForm();
        
        
        return $this->render('ZubiUserBundle:Default:login.html.twig', 
                array('form' => $form->createView(),
                    ));
    }
}

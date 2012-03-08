<?php

namespace Zubi\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\RegisterBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $user = new User();

        
        $form = $this->createFormBuilder($user)
                ->add('login', 'text', array('label' => 'Login'))
                ->add('pass', 'password', array('label' => 'Hasło'))
                ->getForm();
        
        
        return $this->render('ZubiLoginBundle:Default:index.html.twig', 
                array('form' => $form->createView(),
                    ));
    }
}

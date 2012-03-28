<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
    	$user = new User();
    	$user = $this->get('security.context')->getToken()->getUser();
    	return $this->render('ZubiUserBundle:Default:index.html.twig', array('user' => $user));
    }
}

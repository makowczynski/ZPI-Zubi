<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
    	$session = $this->getRequest()->getSession();
    	if ($session->has('user'))
    	{
    		$user = $session->get('user');
    		return $this->render('ZubiUserBundle:Default:index.html.twig', array('user' => $user));
    	}
    	else 
    	{
        	return $this->redirect($this->generateUrl('ZubiUserBundle_login'));
    	}
    }
}

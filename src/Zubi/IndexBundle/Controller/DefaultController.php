<?php

namespace Zubi\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {

    	$session = $this->getRequest()->getSession();
        if ($session->has('user'))
        {
            $user = $session->get('user');
        	return $this->render('ZubiIndexBundle:Default:index.html.twig', array('user' => $user));
        }
        else
        {
        	return $this->render('ZubiIndexBundle:Default:index.html.twig');
        }
    }
    
}

<?php

namespace Zubi\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {

    	$session = $this->getRequest()->getSession();

        $viewVars = array();

        if ($session->has('user')) {
            $user = $session->get('user');
            $viewVars['user'] = $user;
        }

        return $this->render('ZubiIndexBundle:Default:index.html.twig', $viewVars);
    }
    
}

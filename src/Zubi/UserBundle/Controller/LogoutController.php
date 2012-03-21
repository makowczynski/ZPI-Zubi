<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class LogoutController extends Controller
{
    
    public function logoutAction()
    {
    	$session = $this->getRequest()->getSession();
    	$session->remove('user');
        return $this->redirect($this->generateUrl('ZubiIndexBundle_homepage'));
    }
}
<?php

namespace Zubi\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ZubiLoginBundle:Default:index.html.twig', array('name' => $name));
    }
}

<?php

namespace Zubi\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ZubiProfileBundle:Default:index.html.twig', array('name' => $name));
    }
}

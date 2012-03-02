<?php

namespace Zubi\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ZubiFaqBundle:Default:index.html.twig', array('name' => $name));
    }
}

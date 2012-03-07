<?php

namespace Zubi\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ZubiIndexBundle:Default:index.html.twig');
    }
    
}

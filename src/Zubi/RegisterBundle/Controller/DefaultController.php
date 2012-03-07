<?php

namespace Zubi\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ZubiRegisterBundle:Default:index.html.twig');
    }
}

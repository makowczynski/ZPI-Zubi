<?php

namespace Zubi\DeviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
    	
    	

    	
        return $this->render('ZubiDeviceBundle:Default:index.html.twig');
    }

    public function collectAction() {


    	$response = new Response();

    }

    
}

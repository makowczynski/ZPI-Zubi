<?php
/*zmiany TEST git */
namespace Zubi\DeviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ZubiDeviceBundle:Default:index.html.twig');
    }
}

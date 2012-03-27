<?php
namespace Zubi\DeviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Zubi\DeviceBundle\Entity\Measurement;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ZubiDeviceBundle:Default:index.html.twig');
    }

    public function collectAction($stationHash, $measurementType, $measurementValue) {

        // Wyszukanie stacji po hashu
        $station = $this->getDoctrine()
            ->getRepository('ZubiDeviceBundle:Station')
            ->findOneByHash($stationHash);

        if(!$station) {
            return new Response('6 - Station not registered');
        }

        // Wyszukanie rodzaju pomiaru
        $mesType = $this->getDoctrine()
            ->getRepository('ZubiDeviceBundle:MeasurementType')
            ->findOneByName($measurementType);

        if(!$mesType) {
            return new Response('5 - Measurement type unknown');
        }
        
        // Zapisanie pomiaru
        $measurement = new Measurement();
        $measurement->setStation($station);
        $measurement->setMeasurementType($mesType);
        $measurement->setValue($measurementValue);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($measurement);
        $em->flush();

        // Prawidłowe dodanie pomiaru
        return new Response('1 - Measurement added');
    }

    
}

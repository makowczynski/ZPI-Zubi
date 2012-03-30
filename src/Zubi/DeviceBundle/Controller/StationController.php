<?php
namespace Zubi\DeviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Zubi\DeviceBundle\Entity\Measurement;
use Zubi\DeviceBundle\Entity\Station;
use Zubi\DeviceBundle\Form\StationType;

class StationController extends Controller
{
    
    public function indexAction() {

        $user = $this->get('security.context')->getToken()->getUser();

        $stations = $user->getStations();

        $viewVars['stations'] = $stations;

        return $this->render('ZubiDeviceBundle:Station:index.html.twig', $viewVars);
    }

    public function addStationAction(Request $request) {

        $station = new Station();
        $station->setUser($this->get('security.context')->getToken()->getUser());
        
        $form = $this->createForm(new StationType(), $station);

        if($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($station);
                $em->flush();

                return $this->redirect($this->generateUrl('ZubiDeviceBundle_homepage'));
            }
        }

        $viewVars['form'] = $form->createView();
        return $this->render('ZubiDeviceBundle:Station:addStation.html.twig', $viewVars);
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
        $measurement->setTimestamp(new \DateTime());

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($measurement);
        $em->flush();

        // Prawidłowe dodanie pomiaru
        return new Response('1 - Measurement added');
    }    
}

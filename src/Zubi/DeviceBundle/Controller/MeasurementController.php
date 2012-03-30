<?php
namespace Zubi\DeviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Zubi\DeviceBundle\Entity\Measurement;
use Zubi\DeviceBundle\Entity\Station;
use Zubi\DeviceBundle\Form\StationType;

class MeasurementController extends Controller {
    
    public function indexAction($station) {

        $user = $this->get('security.context')->getToken()->getUser();

        $stations = $user->getStations();

        if(count($stations) == 0) {
            return $this->redirect($this->generateUrl('ZubiDeviceBundle_addStation'));
        }
        if(!$station)
            $measurements = $stations[0]->getMeasurements();
        else {
            foreach($stations as $st) {
                if($st->getId() == $station)
                    $measurements = $st->getMeasurements();
            }
        }


        $viewVars['stations'] = $stations;
        $viewVars['measurements'] = $measurements;
        $viewVars['currentStation'] = $station;
        
        return $this->render('ZubiDeviceBundle:Measurement:index.html.twig', $viewVars);
    }
}

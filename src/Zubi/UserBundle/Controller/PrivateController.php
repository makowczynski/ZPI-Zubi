<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class PrivateController extends Controller
{
    
    
    public function privateAction(Request $request) {
        
        $user = new User();
        $user = $this->get('security.context')->getToken()->getUser();
                
        $form = $this->createFormBuilder($user)
                    ->add('osoba_prezentacja', 'checkbox', array('label' => 'Imię dostępne?', 'required'  => false))
                    ->add('kraj_prezentacja', 'checkbox', array('label' => 'Kraj dostępny?', 'required'  => false))
                    ->add('miasto_prezentacja', 'checkbox', array('label' => 'Miasto dostępne?', 'required'  => false))
                    ->add('data_ur_prezentacja', 'checkbox', array('label' => 'Wiek dostępny?', 'required'  => false))
                    ->getForm();

        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {                
                $em = $this->getDoctrine()->getEntityManager();
                $em->flush();

                return $this->redirect($this->generateUrl('ZubiUserBundle_homepage'));
            }
        }

        return $this->render('ZubiUserBundle:Default:private.html.twig', 
                array('form' => $form->createView()));

    }
}

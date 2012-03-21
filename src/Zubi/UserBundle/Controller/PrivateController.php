<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class PrivateController extends Controller
{
    
    
    public function privateAction(Request $request) {
        
        $session = $this->getRequest()->getSession();
        if ($session->has('user'))
        {
            $user = $session->get('user');
            $prywata = new User();

            $user_db = $this->getDoctrine()->getRepository('ZubiUserBundle:User')
                        ->findOneByEmail($user)            
                
            $form = $this->createFormBuilder($prywata)
                    ->add('osoba_prezentacja', 'checkbox', array('label' => 'Ukryć Imię?', 'required'  => false,
                        'attr' => array('checked' => 'yes')))
                    ->add('kraj_prezentacja', 'checkbox', array('label' => 'Ukryć Kraj?', 'required'  => false,
                        'attr' => array('checked' => 'yes')))
                    ->add('miasto_prezentacja', 'checkbox', array('label' => 'Ukryć Miasto?', 'required'  => false,
                        'attr' => array('checked' => 'yes')))
                    ->add('data_ur_prezentacja', 'checkbox', array('label' => 'Ukryć Wiek?', 'required'  => false, 
                        'attr' => array('checked' => 'yes')))
                    ->getForm();

            if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {


            }
        }

            return $this->render('ZubiUserBundle:Default:private.html.twig', 
                    array('form' => $form->createView(), 'user' => $user));
        }
        else
        {
            return $this->redirect($this->generateUrl('ZubiUserBundle_login'));
        }

    }
}

<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class RegisterController extends Controller
{
    
    public function registerAction(Request $request)
    {
        $session = $this->getRequest()->getSession();
        if ($session->has('user'))
        {
            $user = $session->get('user');
            return $this->render('ZubiUserBundle:Default:index.html.twig', array('user' => $user));
        }

        $user = new User();

        
        $form = $this->createFormBuilder($user)
                ->add('email', 'email', array('label' => 'E-mail'))
                ->add('haslo', 'password', array('label' => 'Hasło'))
                ->add('kraj', 'text', array('label' => 'Kraj'))
                ->add('miasto', 'text', array('label' => 'Miasto'))
                ->add('data_ur', 'date', array('widget' => 'choice', 'label' => 'Data urodzenia'))
                ->getForm();

        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $user->setOsobaPrezentacja(1);
                $user->setKrajPrezentacja(1);
                $user->setMiastoPrezentacja(1);
                $user->setDataUrPrezentacja(1);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();


                return $this->redirect($this->generateUrl('ZubiUserBundle_homepage'));
            }
        }
        
        
        return $this->render('ZubiUserBundle:Default:register.html.twig', 
                array('form' => $form->createView()));
    }
}
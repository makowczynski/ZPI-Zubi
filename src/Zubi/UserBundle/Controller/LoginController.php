<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    
    public function loginAction(Request $request)
    {

        $session = $this->getRequest()->getSession();
        if ($session->has('user'))
        {
            $user = $session->get('user');
            return $this->render('ZubiUserBundle:Default:index.html.twig', array('user' => $user));
        }

            
        $user = new User();

        
        $form = $this->createFormBuilder($user)
                ->add('email', 'text', array('label' => 'E-mail'))
                ->add('haslo', 'password', array('label' => 'Hasło'))
                ->getForm();

        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $user_check = $this->getDoctrine()
                                    ->getRepository('ZubiUserBundle:User')
                                    ->findOneByEmail($this1 = $user->getEmail());

                if(!$user_check) 
                {
                    throw $this->createNotFoundException('nie znaleziono: email '.$user->getEmail());
                    
                }

                $session = $this->getRequest()->getSession();
                $session->set('user', $user->getEmail());
                return $this->redirect($this->generateUrl('ZubiUserBundle_homepage'));
            }
        }
        
        
        return $this->render('ZubiUserBundle:Default:login.html.twig', 
                array('form' => $form->createView(),
                    ));        
    }
}
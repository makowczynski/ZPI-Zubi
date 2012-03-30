<?php

namespace Zubi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class ListController extends Controller
{
    
    public function listAction(Request $request)
    {
        // $user = new User();

        $users = $this->getDoctrine()->getRepository('ZubiUserBundle:User')
        		->findAll();

        return $this->render('ZubiUserBundle:Default:list.html.twig', array('users' => $users));

    }
}
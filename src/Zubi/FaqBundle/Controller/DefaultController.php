<?php

namespace Zubi\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
     $faqs = $this->getDoctrine()
        ->getRepository('ZubiFaqBundle:Faq')
        ->findAll();
     //  $faq = $faqs[0];
      // foreach ($faqs as $faq) {
      //     
      // }
      // $res="dupa";
        return $this->render('ZubiFaqBundle:Default:index.html.twig', array('faqs'=>$faqs));
    }
}

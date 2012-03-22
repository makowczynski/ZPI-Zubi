<?php

namespace Zubi\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\FaqBundle\Entity\Faq;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
     $newFaq = new Faq();
     $form = $this->createFormBuilder($newFaq)     
             ->add('Tresc', 'text')
             ->add('odpowiedz', 'text')
             ->add('id_statusu', 'text')
             ->getForm();
     
      if($request->getMethod() == 'POST') {
          
            $form->bindRequest($request);
         
            if($form->isValid()) {
                 $em = $this->getDoctrine()->getEntityManager();
                 $em->persist($newFaq );
                 $em->flush();
               // $newFaq->$form->getData();
            }
      } 
     
     $faqs = $this->getDoctrine()
        ->getRepository('ZubiFaqBundle:Faq')
        ->findAll();
     //  $faq = $faqs[0];
      // foreach ($faqs as $faq) {
      //     
      // }
      // $res="dupa";
        return $this->render('ZubiFaqBundle:Default:index.html.twig', 
                array('faqs'=>$faqs, 
                    'form'=>$form->createView()));
    }
    
}

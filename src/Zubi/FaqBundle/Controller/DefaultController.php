<?php

namespace Zubi\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\FaqBundle\Entity\Faq;
use Zubi\FaqBundle\Form\Faq\FaqForm;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
        
     $newFaq = new Faq();
     $form = $this->createForm(new FaqForm(), $newFaq);      
     if($request->getMethod() == 'POST') {          
        $form->bindRequest($request);         
        $validator = $this->get('validator');
            $errors = $validator->validate($newFaq);
        if (count($errors) < 1) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($newFaq );
                $em->flush();
                //po poprawnym dodaniu danych z formularza, chcemy mieć go pustego.
                $newFaq = new Faq();
                $form = $this->createForm(new FaqForm(), $newFaq);                 
        }                     
     }       
     //pobieramy z bazy wszystkie faq
     $faqs = $this->getDoctrine()
        ->getRepository('ZubiFaqBundle:Faq')
        ->findAll();
        return $this->render('ZubiFaqBundle:Default:index.html.twig', 
                array('faqs'=>$faqs, 
                    'form'=>$form->createView()));
    }
    
}

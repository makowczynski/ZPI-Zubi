<?php

namespace Zubi\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\FaqBundle\Entity\Faq;
use Zubi\FaqBundle\Entity\Status_widocznosci;
use Zubi\FaqBundle\Form\Faq\FaqForm;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
        
     $newFaq = new Faq();
     $form = $this->createForm(new FaqForm(), $newFaq);      
     //jeśli strona wyswietla się po przesłaniu formularza w POST
     //trzeba spróbować dodać dane do bazy danych
     if($request->getMethod() == 'POST') {          
        $form->bindRequest($request);         
        $validator = $this->get('validator');
            $errors = $validator->validate($newFaq);
        //jeśli przesyłane dane są poprawne
        //dodajemy je do bazy oraz czyścimy formularz.
        if (count($errors) < 1) {
                $em = $this->getDoctrine()->getEntityManager();                               
               // $sw = new Status_widocznosci();
                echo "<h1>".$newFaq->getIdStatusu()."</h1>";
                 $sw = $this->getDoctrine()
                        ->getRepository('ZubiFaqBundle:Status_widocznosci')
                        ->findOneByNazwa($newFaq->getIdStatusu());
                $newFaq->setStatusWidocznosci($sw);
                $em->persist($newFaq );
                $em->flush();
                //po poprawnym dodaniu danych z formularza, chcemy mieć go pustego.
                //$newFaq = new Faq();
                //$form = $this->createForm(new FaqForm(), $newFaq);                 
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

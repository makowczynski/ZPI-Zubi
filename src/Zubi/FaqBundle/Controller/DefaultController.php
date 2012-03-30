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
    //kontroler odpowiadający za edycję FAQ
    public function editAction(Request $request, $id) {
        $backLink = $this->generateUrl('ZubiFaqBundle_homepage');
        $newFaq = new Faq();
        $em = $this->getDoctrine()->getEntityManager();    
        $editedFaq = $this->getDoctrine()
                    ->getRepository('ZubiFaqBundle:Faq')
                    ->findOneById($id);
        if ($editedFaq) {
            $form = $this->createForm(new FaqForm(), $editedFaq);          
            if($request->getMethod() != 'POST') {                         
                $form = $this->createForm(new FaqForm(), $editedFaq);  
                return $this->render('ZubiFaqBundle:Default:edit.html.twig',
                        array ('form' => $form->createView(),
                                'backLink' => $backLink ));
            }
            else {                    
                $form->bindRequest($request);         
                $validator = $this->get('validator');
                $errors = $validator->validate($editedFaq);
                if (count($errors) < 1) 
                {                                                                          
                    $sw = $this->getDoctrine()
                            ->getRepository('ZubiFaqBundle:Status_widocznosci')
                            ->findOneById($editedFaq->getStatusWidocznosci()->getId());
                    $editedFaq->setStatusWidocznosci($sw);                
                    $em->flush();
                    $this->get('session')->setFlash('notice', 'Sukces edycji FAQ pt: "'.$editedFaq->getTresc().'"');
                    return $this->redirect($this->generateUrl('ZubiFaqBundle_homepage'));
                }                     
            }
        }
        else{
            $this->get('session')->setFlash('errorMsg', 'Nie ma czego edytować, nie ma FAQ o id: '.$id.'!');
            return $this->redirect($this->generateUrl('ZubiFaqBundle_homepage'));
        }                
      }
    
    //kontroler odpowiadajcy za usuwanie FAQ
    public function deleteAction($id) {
        $em = $this->getDoctrine()->getEntityManager();                               
        //pobieramy z bazy FAQ do skasowania.
        $delFaq = $this->getDoctrine()
                ->getRepository('ZubiFaqBundle:Faq')
                ->findOneById($id);         
        if ($delFaq) {
            // kasujemy FAQ 
            $em->remove($delFaq);
            $em->flush();
            // przekierowanie na index z FAQ
            $this->get('session')->setFlash('notice', 'Skasowałeś FAQ pt: "'.$delFaq->getTresc().'"');
            return $this->redirect($this->generateUrl('ZubiFaqBundle_homepage'));
                        
            // TODO: Może jakieś pytanie czy na 100% usunąć? Na razie nie ma
        }
        else {
            $this->get('session')->setFlash('errorMsg', 'Nie ma czego kasowac, nie ma FAQ o id: '.$id.'!');
            return $this->redirect($this->generateUrl('ZubiFaqBundle_homepage'));
        }          
    }    
    
    public function indexAction(Request $request)
    {
     $newFaq = new Faq();
     $em = $this->getDoctrine()->getEntityManager();    
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
                $sw = $this->getDoctrine()
                        ->getRepository('ZubiFaqBundle:Status_widocznosci')
                        ->findOneById($newFaq->getStatusWidocznosci()->getId());
                $newFaq->setStatusWidocznosci($sw);
                $em->persist($newFaq );
                $em->flush();
                 $this->get('session')->setFlash('notice', 'Poprawnie dodałeś nowe FAQ.');
                //po poprawnym dodaniu danych z formularza, chcemy mieć go pustego.                
                $newFaq = new Faq();
                $form = $this->createForm(new FaqForm(), $newFaq);                 
        }                     
     }       
     //pobieramy z bazy wszystkie faq     
     $faqs = $em->getRepository('ZubiFaqBundle:Faq')->findAll();     
     // dla każdego faq tworzę link do jego usunięcia.
     $a = 0;
     $delLinks[0]="";
     $editLinks[0] = "";
     foreach ($faqs as $faq) {
         $delLinks[$a] = $this->generateUrl('ZubiFaqBundle_delete', array ('id' => $faq->getId() ));
         $editLinks[$a] = $this->generateUrl('ZubiFaqBundle_edit', array ('id' => $faq->getId() ));
         $a++;                 
     }
     return $this->render('ZubiFaqBundle:Default:index.html.twig', 
                array('faqs' => $faqs, 
                      'delLinks' => $delLinks,
                      'editLinks' => $editLinks,
                      'form' => $form->createView()));
    }
    
}

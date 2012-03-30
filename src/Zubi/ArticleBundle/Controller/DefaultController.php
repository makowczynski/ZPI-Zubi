<?php

namespace Zubi\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zubi\ArticleBundle\Entity\Article;
use Zubi\ArticleBundle\Form\Article\ArticleForm;

class DefaultController extends Controller
{
    
    public function indexAction()
    {        
        $em = $this->getDoctrine()->getEntityManager();            
        $articles = $em->getRepository('ZubiArticleBundle:Article')->findAll();     
        return $this->render('ZubiArticleBundle:Default:index.html.twig',
                array (
                    'articles' => $articles                   
                ));
    }
    
    /*
    public function addArticleAction()
    {
        $newArticle = new Article();
        $em = $this->getDoctrine()->getEntityManager();    
        $form = $this->createForm(new ArticleForm(), $newArticle);          
        return $this->render('ZubiArticleBundle:Default:addArticle.html.twig',
                array (
                    'articles' => $articles,
                    'form' => $form->createView()                    
                ));
    }
     * 
     */
}

<?php

namespace Zubi\ArticleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    //testowanie strony z listą artykułów
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/');        
        $this->assertTrue(true);        
        $this->assertTrue($client->getResponse()->getStatusCode() == '200' ,
                "Response code is: ".$client->getResponse()->getStatusCode().
                "not 200!!!!");
        //jeśli na stronie wystapi wyrażenie LISTA, jest poprawinie     
        $this->assertRegExp('/Lista artykułów/', $client->getResponse()->getContent());  
        $this->assertTrue($crawler->filter('h3:contains("Li")')->count() > 0);    
        //$this->assertTrue($crawler->filter('contains("Lista artykułów")')->count() > 0);
    }
    
    //testowanie strony wyśietlającej artykuł
    public function testShowArticle()
    {       
        $client = static::createClient();        
        $crawler = $client->request('GET', '/article/show/1');
        $this->assertTrue(true);          
        $this->assertTrue($client->getResponse()->getStatusCode() == '200' ,
                "Response code is: ".$client->getResponse()->getStatusCode().
                "not 200!!!!");
        $cont = $client->getResponse()->getContent();                        
        $this->assertTrue($crawler->filter('a:contains("do listy")')->count() > 0);    
       // $link = $crawler->filter('a:contains("Greet")')->eq(1)->link();
    }      
}

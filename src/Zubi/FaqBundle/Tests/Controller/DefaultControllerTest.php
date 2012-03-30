<?php

namespace Zubi\FaqBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq/');            
        
        $this->assertTrue(true);
        //jeśli na stronie wystąpią minimum 1 wyrażenia FAQ, strona załadowana 
        //jest poprawinie
        $this->assertTrue($crawler->filter('html:contains("FAQ")')->count() > 0);       
    }
    
    public function testFAQlist()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq/');    
        // jeśli jest wyrażenie 1. to znaczy że wyświetliło się przynajmniej jedno 
        // pytanie
        $this->assertRegExp('/1./', $client->getResponse()->getContent());      
    //  $this->assertTrue($crawler->filter('html:contains("FAQ")')->count() > 0);   
    }
    
    public function testFaqDelete()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq/delete/2');    
        // jeśli jest wyrażenie 1. to znaczy że wyświetliło się przynajmniej jedno 
        // pytanie
         $this->assertTrue($client->getResponse()->getStatusCode() == '302' ,
                "Response code is: ".$client->getResponse()->getStatusCode().
                "not 302!!!!");
        
        
    //  $this->assertTrue($crawler->filter('html:contains("FAQ")')->count() > 0);   
    }
    
    
    public function testFaqEdit()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq/edit/2');    
        // jeśli jest wyrażenie 1. to znaczy że wyświetliło się przynajmniej jedno 
        // pytanie
         $this->assertTrue($client->getResponse()->getStatusCode() == '302' ,
                "Response code is: ".$client->getResponse()->getStatusCode().
                "not 302!!!!");
        
        
    //  $this->assertTrue($crawler->filter('html:contains("FAQ")')->count() > 0);   
    }

}

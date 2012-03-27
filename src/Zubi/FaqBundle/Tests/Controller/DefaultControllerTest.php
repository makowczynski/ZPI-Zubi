<?php

namespace Zubi\FaqBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq');    
        $this->assertTrue($crawler->filter('html:contains("1111.")')->count() > 0);
    }
}

<?php

namespace Zubi\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->followRedirects(true);

        $crawler = $client->request('GET', '/profile');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("Pass")')->count() > 0);

        $form = $crawler->selectButton('login')->form();

		$form['_username'] = 'pawel@costam.com';
		$form['_password'] = 'asdf';

		$crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isSuccessful());

		$this->assertTrue($crawler->filter('html:contains("pawel@costam.com")')->count() > 0);


        $crawler = $client->request('GET', '/profile/list');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("miasto")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("kraj")')->count() > 0);

    }
}
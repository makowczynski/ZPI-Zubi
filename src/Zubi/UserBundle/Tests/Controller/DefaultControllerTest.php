<?php

namespace Zubi\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->followRedirects(true);

<<<<<<< HEAD
        //$crawler = $client->request('GET', '/hello/Fabien');

        //$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
=======
        $crawler = $client->request('GET', '/profile');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("Pass")')->count() > 0);

        $form = $crawler->selectButton('login')->form();

		$form['_username'] = 'pawel@costam.com';
		$form['_password'] = 'asdf';

		$crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isSuccessful());

		$this->assertTrue($crawler->filter('html:contains("pawel@costam.com")')->count() > 0);

>>>>>>> c512917f49a947366925c9a77aba789a8b40c92a
    }
}

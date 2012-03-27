<?php

namespace Zubi\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

<<<<<<< HEAD
        //$crawler = $client->request('GET', '/hello/Fabien');

        //$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
=======
        $crawler = $client->request('GET', '/profile');
        $crawler = $client->followRedirect();

        $this->assertTrue($crawler->filter('html:contains("Pass")')->count() > 0);

        $form = $crawler->selectButton('login')->form();

		$form['_username'] = 'pawel@costam.com';
		$form['_password'] = 'asdf';

		$crawler = $client->submit($form);

		// $this->assertTrue($crawler->filter('html:contains("Username")')->count() > 0);

>>>>>>> c512917f49a947366925c9a77aba789a8b40c92a
    }
}

<?php

namespace Zubi\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EdituserControllerTest extends WebTestCase
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

        $crawler = $client->request('GET', '/profile/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("urodzenia")')->count() > 0);

        $form = $crawler->selectButton('update')->form();

        $form['form[miasto]'] = 'Choszczno';
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertTrue($crawler->filter('html:contains("Miasto: Choszczno")')->count() > 0);

        $crawler = $client->request('GET', '/profile/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("urodzenia")')->count() > 0);

        $form = $crawler->selectButton('update')->form();

        $form['form[miasto]'] = 'Szczecin';
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertTrue($crawler->filter('html:contains("Miasto: Szczecin")')->count() > 0);

    }
}
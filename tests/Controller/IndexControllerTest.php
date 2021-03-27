<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
  public function testIndexPageIsUp()
  {
    $client = static::createClient();
    $client->request( 'GET', '/');
    $this->assertEquals(200, $client->getResponse()->getStatusCode());
  }

  public function testIndexPage()
  {
    $client = static::createClient();
    $crawler = $client->request( 'GET', '/');
    $this->assertEquals(1, $crawler->filter('html:contains("Bienvenue")')->count());
  }

  public function testMentionsPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Mentions légales')->link();
        $crawler = $client->click($link);
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
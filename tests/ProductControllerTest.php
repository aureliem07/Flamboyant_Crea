<?php
// tests/Controller/PostControllerTest.php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testProductRoute()
    {
        $client = static::createClient();

        // GET pour afficher la page
        $client->request('GET', '/produit/{id}');

        // on vérifie que la réponse est 200 ( OK )
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPostForm()
    {
        $client = static::createClient();

        //GET pour afficher le formulaire
        $crawler = $client->request('GET', '/articlecreate/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // on selectionne le bouton pour envoyer le formulaire
        $form = $crawler->selectButton('form_save')->form();

        // on rempli le formulaire avec nos données
        $form['form[image]'] = 'mon_image';
        $form['form[description]'] = 'ma_description';
        $form['form[title]'] = 'mon_titre';

        // on envoie le formulaire
        $client->submit($form);

        // on vérifie que la réponse est 200 ( OK )
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
}
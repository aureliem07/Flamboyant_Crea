<?php

namespace App\Tests\Entity;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProduitEntityTest extends KernelTestCase
{
  public function getEntity(): Produit
  {
    return (new Produit())
    ->setReference('12345')
    ->setNom('Nom du produit')
    ->setDescription('Description du produit')
    ->setImageUrl('https://cdn.pixabay.com/photo/2017/09/25/13/12/dog-2785074_960_720.jpg')
    ->setStock('4')
    ->setPrixUnitaire('1.99');
  }

  public function assertHasErrors(Produit $code, int $number = 0){
    self::bootKernel();
    $error = self::$container->get('validator')->validate($code);
    $this->assertCount($number, $error);
  }

  public function testValidProduitEntity()
  {
    $this->assertHasErrors($this->getEntity(), 0);
  }

  public function testInvalidProduitEntity()
  {
    $this->assertHasErrors($this->getEntity()->setImageUrl('chaine de caractères'), 1);
  }

  public function testInvalidBlankProduitEntity()
  {
    $this->assertHasErrors($this->getEntity()->setImageUrl(''), 1);
  }

}
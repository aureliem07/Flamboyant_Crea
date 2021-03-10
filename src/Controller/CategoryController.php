<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categorie/{category_name}", name="category")
     */
    public function category(string $category_name): Response
    {
        $bdd_category = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy([
               'nom' => $category_name]);

        $products = $bdd_category->getProduits();
            
        return $this->render('category/category.html.twig', [
            'categorie' => $bdd_category,
            'produits' =>  $products,
        ]);
    }
}

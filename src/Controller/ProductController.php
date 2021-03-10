<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;

class ProductController extends AbstractController
{
    /**
     * @Route("/produit/{id}", name="product")
     */
    public function product($id): Response
    {
        $bdd_product = $this->getDoctrine()
        ->getRepository(Produit::class)
        ->find($id);

        return $this->render('product/product.html.twig', [
            'produit' => $bdd_product,
        ]);
    }
}



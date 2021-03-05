<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/couture", name="couture")
     */
    public function couture(): Response
    {
        return $this->render('produit/couture.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
}

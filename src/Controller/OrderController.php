<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    /**
     * @Route("/commande/creation", name="order_create")
     */
    public function create(SessionInterface $session, Security $security, EntityManagerInterface $entityManager)
    {
        $panier = $session->get('panier', []);
        dd($panier);

        $order = new Order();
        
        $order->setUser($security->getUser());






    }
}

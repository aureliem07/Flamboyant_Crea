<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
        ]);
    }

    /**
     * @Route("/mentionslegales", name="mentions")
     */
    public function mentions(): Response
    {
        return $this->render('index/mentions.html.twig', [
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {   
        return $this->render('index/contact.html.twig', [
        ]);
    }
}

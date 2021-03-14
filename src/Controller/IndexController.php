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
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();

            //ici nous enverons le mail
            $message = (new \Swift_Message('Nouveau contact'))
                //on attribue l'expéditeur
                ->setFrom($contact['email'])

                //on attribue le destinataire
                ->setTo('monadressemail@gmail.com')

                //on crée le message avec la vue Twig
                ->setBody(
                    $this->renderView(
                        'emails/emailcontact.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;

            //on envoie le message
            $mailer->send($message);

            $this->addFlash('message', 'Le message a bien été envoyé.');
            return $this->redirectToRoute('index');
        }

        return $this->render('index/contact.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SecurityController extends AbstractController
{
  /**
   * @Route("/inscription", name="security_registration")
   */
  public function registration(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder)
  {
    $user = new User();

    $form = $this->createForm(RegistrationType::class, $user);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $hash = $encoder->encodePassword($user, $user->getPassword());

      $user->setPassword($hash);

      $entityManager->persist($user);
      $entityManager->flush();

      if ($user->getId()) {
        $this->addFlash('success', 'Votre compte a bien été créé.');
      } else {
        $this->addFlash('error', 'Votre compte n\'a pas pu être créé.');
      }

      return $this->redirectToRoute('security_login');
    }

    return $this->render('security/registration.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/connexion", name="security_login")
   */
  public function login()
  {
    return $this->render('security/login.html.twig');
  }

  /**
   * @Route("/déconnexion", name="security_logout")
   */
  public function logout()
  {
  }

  /**
   * @Route("/compte", name="security_account")
   */
  public function account()
  {
    return $this->render('security/account.html.twig');
  }

  /**
   * @Route("/donnees", name="security_personalData")
   */
  public function personalData()
  {
    return $this->render('security/personalData.html.twig');
  }

  // /**
  //  * @Route("/compte/supprimer", name="security_remove")
  //  */
  // public function remove(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage, SessionInterface $session)
  // {
  //   $user = $this->getUser();

  //   $entityManager->remove($user);
  //   $entityManager->flush();

  //   if (!$user->getId()) {
  //     $tokenStorage->setToken(NULL);
  //     $session->invalidate();

  //     $this->addFlash('success', 'Votre compte a bien été supprimé.');
  //     return $this->redirectToRoute('index');
  //   } else {
  //     $this->addFlash('error', 'Votre compte n\'a pas pu être supprimé.');

  //     return $this->redirectToRoute('security_account');
  //   }
  // }
}

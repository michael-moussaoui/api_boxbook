<?php

// namespace App\Controller;

// use App\Entity\User;
// use App\Form\RegisterType;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

// class LoginController extends AbstractController
// {
//     #[Route('/login1', name: 'app_login1')]
//     public function index(AuthenticationUtils $authenticationUtils): Response
//     {
//         // get the login error if there is one
//         $error = $authenticationUtils->getLastAuthenticationError();
//         // last username entered by the user
//         $lastUsername = $authenticationUtils->getLastUsername();
//         return $this->render('login/index.html.twig', [
//             'last_username' => $lastUsername,
//             'error'         => $error,
//         ]);
//     }
// }

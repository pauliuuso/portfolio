<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 *
 * @Route("/security")
 *
 */
class SecurityController extends AbstractController
{
    /**
     * @param Request             $request
     * @param AuthenticationUtils $utils
     *
     * @Route("/login", name="login")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $utils)
    {

        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'error' => $error,
            'lastUsername' => $lastUsername
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }

    /**
     * @param Request                      $request
     * @param UserService                  $userService
     * @param UserPasswordEncoderInterface $encoder
     *
     * @Route("/register", name="register")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function register(
        Request $request,
        UserService $userService,
        UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $userService->create($user);

            return $this->redirect('login');
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

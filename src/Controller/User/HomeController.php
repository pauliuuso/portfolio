<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/")
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function index()
    {
        return $this->render('user/home/home.html.twig');
    }
}
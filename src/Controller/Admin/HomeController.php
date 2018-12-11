<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/admin")
 */
class HomeController extends Controller
{
    /**
     * @return Response
     *
     * @Route("/home", name="admin_home")
     */
    public function index()
    {
        return $this->render('admin/home/home.html.twig');
    }
}
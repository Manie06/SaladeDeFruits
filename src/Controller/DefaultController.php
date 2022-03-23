<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="app_default")
     */
    public function home(): Response
    {
        return $this->render('base.html.twig');
    }

    public function index()
    {
        return $this->render('security/index.html.twig');
    }
}

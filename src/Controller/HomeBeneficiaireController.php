<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeBeneficiaireController extends AbstractController
{

    public function HomeBeneficiaire(): Response
    {
        return $this->render('home_beneficiaire/index.html.twig');
    }

    public function HomeAccompagnant(): Response
    {
        return $this->render('home_accompagnant/index.html.twig');
    }
}

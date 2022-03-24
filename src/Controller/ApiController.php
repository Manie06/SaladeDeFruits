<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController {

    public function getData() {

        $cities = ['paris', 'poitier', 'perpignan', 'pau','paars', 'pabu', 'pace',  ' pact',  'pacy-sur-Armancon', 'pacy-sur-Eure', 'padern', 'padies',  'padirac',  'padoux',  'pageas',  'pagney', 'pagney-Derriere-Barine', 'pagnoz', 'pagny-la-Blanche-Cote', 'pagny-la-Ville',  'pagny-le-Chateau',  'pagny-les-Goin',  'pagny-sur-Meuse',  'pagny-sur-Moselle', 'pagolle', 'pailhac', 'pailhares', 'pailherols', 'pailhes'];
        

    return new JsonResponse($cities);


    }
}
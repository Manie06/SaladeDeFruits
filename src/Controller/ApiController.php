<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController {

    public function getData() {

        $cities = ['paris', 'abidjan','monaco','istanbul', 'poitier', 'perpignan', 'marseille', 'pau'];
        

    return new JsonResponse($cities);
;

    }
}
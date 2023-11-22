<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DocketController extends AbstractController
{
    #[Route('/docket', name: 'app_docket')]
    public function index(): Response
    {
        return $this->render('docket/index.html.twig', [
            'controller_name' => 'DocketController',
        ]);
    }
}

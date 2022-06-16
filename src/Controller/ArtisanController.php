<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtisanController extends AbstractController
{
    #[Route('/artisan', name: 'app_artisan')]
    public function index(): Response
    {
        return $this->render('artisan/index.html.twig', [
            'controller_name' => 'ArtisanController',
        ]);
    }
}

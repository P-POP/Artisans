<?php

namespace App\Controller;


use App\Repository\OwnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/avis/{id}', name: 'app_avis', requirements: ['id' => '\d+'])]
    public function index(int $id,OwnerRepository $ownerRepository): Response
    {
        return $this->render('avis/index.html.twig', [
            'owner' => $ownerRepository->find($id)
        ]);
    }
}

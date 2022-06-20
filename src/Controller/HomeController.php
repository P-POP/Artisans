<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Repository\ArtisanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name:'app_home')]

    public function maps(ArtisanRepository $artisanRepository):Response
    {

        $mapAddress =[];
        $artisans = $artisanRepository->findAll();
        

        foreach ($artisans as $artisan) {

            $mapAddress[] = [

                $artisan -> getName() =>   $artisan -> getAddress()  
            
            ];

        }
    
       
    

        return $this->render('home/index.html.twig', [

            'artisans' => $mapAddress
        ]);
    }
}
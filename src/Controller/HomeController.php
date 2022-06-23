<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\Type;
use App\Repository\ArtisanRepository;
use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name:'app_home')]

    public function maps(ArtisanRepository $artisanRepository, TypeRepository $typeRepository, UserRepository $userRepository):Response
    {
        
        $i = [1,2,3,4];

        $lastArtisans = $artisanRepository->find2LastInserted();

        $i = [1,2,3,4];

        $lastArtisans = $artisanRepository->find2LastInserted();

        $mapAddress =[];
        $artisansAdress = $artisanRepository->findAll();
        
        foreach ($artisansAdress as $artisanAdress) {

            $mapAddress[] = [
                $artisanAdress->getName() => $artisanAdress->getAddress()  
            ];
        }
    
        return $this->render('home/index.html.twig', [
            'i' => $i,
            'lastArtisans' => $lastArtisans,
            'artisansAdress' => $mapAddress,


            'artisanType' => $typeRepository->findAll()


        ]);
    }

    #[Route ('/type/{id}', name:'app_type_artisans', requirements:["id"=>"\d+"])]

    public function types(Type $type, ArtisanRepository $artisanRepository)
    
    {
        return $this->render('artisan/typeArtisan.html.twig', [
            'type'=> $type,
            'allArtisansFromType'=>$artisanRepository->findAll()
        ]);
    } 


}
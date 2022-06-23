<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Entity\Owner;
use App\Form\OwnerFormType;
use App\Repository\ArtisanRepository;
use App\Repository\OwnerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AvisController extends AbstractController
{
    #[Route('/avis/{id}', name: 'app_avis', requirements:['id' => '\d+'])]
    #[IsGranted("ROLE_USER")]
    public function index(Artisan $artisan, Request $request, OwnerRepository $ownerRepository): Response
    {
       
            $this->denyAccessUnlessGranted("AVIS_ADD", $artisan);
          
            $avis = New Owner();
            $form = $this->createForm(OwnerFormType::class, $avis);
            $form->handleRequest($request);

            

            

            if($form->isSubmitted() && $form->isValid()) {
                $avis->setUser($this->getUser());
                $avis->setArtisan($artisan);
                $ownerRepository->add($avis, true);
                $this->addFlash('sucess', 'Merci pour votre avis');

                return $this->redirectToRoute('app_home');

            }

            return $this->render('avis/index.html.twig', [
                'form'=> $form->createView(),
                
                
        ]);
    }

    
}


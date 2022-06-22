<?php

namespace App\Controller;


use App\Entity\Owner;
use App\Form\OwnerFormType;
use App\Repository\OwnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis', requirements:['id' => '\d+'])]
    public function index(Request $request, OwnerRepository $ownerRepository): Response
    {
        $this->denyAccessUnlessGranted("POST_VIEW", $this->getUser());
        $this->denyAccessUnlessGranted("POST_ADD", $this->getUser());
          
            $avis = New Owner();
            $form = $this->createForm(OwnerFormType::class, $avis);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $ownerRepository->add($avis, true);
                $this->addFlash('sucess', 'Merci pour votre avis');

                return $this->redirectToRoute('app_home');

            }

            return $this->render('avis/index.html.twig', [
                'form'=> $form->createView()

        ]);
    }
}
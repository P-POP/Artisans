<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Entity\Artisan;
use App\Entity\Owner;
use App\Entity\Type;
use App\Form\OwnerFormType;
use App\Repository\ArtisanRepository;
=======

>>>>>>> a8ed7e2f60d800a5ccd7afe95514ee62cf8aed27
use App\Repository\OwnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AvisController extends AbstractController
{
<<<<<<< HEAD
    #[Route('/avis', name: 'app_avis', requirements:['id' => '\d+'])]
    public function index(Request $request, OwnerRepository $ownerRepository): Response
    {
          
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

=======
    #[Route('/avis/{id}', name: 'app_avis', requirements: ['id' => '\d+'])]
    public function index(int $id,OwnerRepository $ownerRepository): Response
    {
        return $this->render('avis/index.html.twig', [
            'owner' => $ownerRepository->find($id)
>>>>>>> a8ed7e2f60d800a5ccd7afe95514ee62cf8aed27
        ]);
    }
}
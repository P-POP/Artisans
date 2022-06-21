<?php

namespace App\Controller;

use App\Entity\Artisan;
use App\Form\ArtisanFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ArtisanRepository;
use App\Repository\OwnerRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ArtisanController extends AbstractController
{
    #[Route('/artisan', name: 'app_artisan')]
    public function index(ArtisanRepository $artisanRepository, PaginatorInterface $paginatorInterface, Request $request ): Response
    {
        $artisans = $paginatorInterface->paginate(
            $artisanRepository->findAll(), //Requête SQL/DQL
            $request->query->getInt('page', 1), //Numéritation des pages 
            $request->query->getInt('numbers', 5) //Nombre d'enregistrement par page
        );
        return $this->render('artisan/index.html.twig', [
            'artisans' => $artisans,
            'details' => $artisanRepository->find(5)
        ]);
    }
    //Ajout d'un nouveau artisan
    
    #[Route('/artisan/new',name:'app_new_artisan')]
    public function newArtisan(Request $request, ArtisanRepository $artisanRepository) :Response
    {
        $artisan = new Artisan();

        $form = $this->createForm(ArtisanFormType::class, $artisan);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 

            $artisanRepository->add($artisan, true);

            $this->addFlash(
               'success',
               'L\'artisan a bien été ajouté !'
            );

            //$magazine = new Magazine();
            //$form = $this->createForm(MagazineFormType::class, $magazine);

            return $this->redirectToRoute('app_artisan');
            
        }

        return $this->render('artisan/newArtisan.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('/artisan/edit/{id}', name: 'app_edit_artisan', requirements:["id"=>"\d+"])]
    public function edit (Artisan $artisan, ArtisanRepository $artisanRepository, Request $request, int $id )
    {


	    $form=$this->createForm(ArtisanFormType::class, $artisan);
	    $form->handleRequest($request); 
	    if ($form->isSubmitted() && $form->isValid()) {

           	$artisanRepository->add($artisan, true);

            $this->addFlash('success', 'L\'artisan a bien été modifié !');

           	return $this->redirectToRoute('app_artisan');
        }

        	return $this->render('artisan/edit.html.twig', [
           	 'form'=> $form->createView()
        ]);
    }

    #[Route('/artisan/delet/{id}', name:'app_delete_artisan', requirements: ['id'=> '\d+'], methods: ['POST'])]
    public function remove(Artisan $artisan, Request $request, ArtisanRepository $artisanRepository): RedirectResponse
    {
        $tokenCsrf = $request->request->get('token');
        if ($this->isCsrfTokenValid('delete-artisan-'. $artisan->getId(), $tokenCsrf)){

            $artisanRepository->remove($artisan, true);
            $this->addFlash('success', 'L\'artisan à bien été supprimé');

        }

        return $this->redirectToRoute('app_artisan');
    }


    #[Route('/artisan/{id}', name: 'app_details_artisans', requirements:["id"=>"\d+"])]
    public function details( int $id, ArtisanRepository $artisanRepository, Artisan $artisan)
    {
        $mapOneAddress =[];
        $artisan = $artisanRepository->find($id);

        $mapOneAddress[]= [
            $artisan->getNAme()=> $artisan->getAddress()
        ];
        
        return $this->render('artisan/detailsArtisan.html.twig', [
           'artisanAdress'=> $mapOneAddress,
           "artisan" => $artisan
        ]);
    }

    /* //Création de la route pour le detail des avis concernant un artisan
    #[Route('/artisan/{id}', name: 'app_details_with_avis__artisans', requirements:['id' => '\d+'])]
    public function detailsWithAvis(Artisan $artisan): Response
    {
        $i=1;
        
        return $this->render('artisan/details.html.twig', [
            'artisan' => $artisan
        ]);
    } */

}
  

    

<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]
class UserController extends AbstractController
{
    #[Route('/account', name: 'app_user')]
    public function index(): Response
    {
       

        return $this->render('user/index.html.twig', [
        ]);
    }
}
<?php

namespace App\Controller\Admin;

use App\Entity\Artisan;
use App\Entity\Owner;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    

    

    #[Route('/admin', name: 'admin')]

    public function index(): Response
    {
                
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Artisans');
            
            

    }

    public function configureMenuItems(): iterable
    {
            
        return [

            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),            
            MenuItem::linkToCrud('utilisateurs', 'fa fa-user-circle-o', User::class),            
            MenuItem::linkToCrud('Artisans', 'fas fa-list', Artisan::class),            
            MenuItem::linkToCrud('Avis', 'fas fa-list', Owner::class),               
            MenuItem::linkToCrud('Type', 'fas fa-list', Type::class),
            
        ];
            
    }
    
    


}

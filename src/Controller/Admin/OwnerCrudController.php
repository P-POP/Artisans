<?php

namespace App\Controller\Admin;

use App\Entity\Owner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class OwnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Owner::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('avis'),
            
        ];
    }
    
}

<?php

namespace App\Controller\Admin;

use App\Entity\Artisan;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArtisanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Artisan::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('name'),
            TextField::new('address'),
            NumberField::new('phone'),
            EmailField::new('email')
            ->setFormTypeOption('disabled','disabled'),
            TextEditorField::new('description'),
            ImageField::new('cover')
            ->setBasePath('uploads/cover')
            ->setUploadDir('public/images')
        ];
    }
    

        public function configureActions(Actions $actions): Actions
    {
        

        return $actions
            
            // you can set permissions for built-in actions in the same way
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
        ;
    }

    
}

<?php

namespace App\Controller\Admin;

use App\Entity\Artisan;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArtisanCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Artisan::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('name', 'nom'),
            TextField::new('address'),
            NumberField::new('phone'),
            EmailField::new('email')
            ->setFormTypeOption('disabled','disabled'),
            TextEditorField::new('description'),
            TextField::new('coverFile', 'image')
            ->setFormType(VichImageType::class)
            ->onlyOnForms(),
            ImageField::new('cover', 'image')
            ->setBasePath('images/artisans')
            ->setUploadDir('public/images/artisans')
            ->hideOnForm()
            
        ];
    }
    

    

    
}
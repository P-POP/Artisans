<?php

namespace App\Form;

use App\Entity\Artisan;
use App\Entity\Owner;
use App\Entity\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OwnerFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('avis',TextType::class, [
                'label'=> 'Déposez un avis',
                'required' => false
            ])
            //->add('artisan', EntityType::class, [
                //'class' => Artisan::class,
               // 'choice_label' => 'name',
           // ])
            ->add('score', ChoiceType::class, [
                'label'=> 'Attribuez une note générale: 
                ★ Mauvais - ★★★★★ Excellent!',
                'choices' => [
                    '★' => 1,
                    '★★' => 2,
                    '★★★' => 3,
                    '★★★★' => 4,
                    '★★★★★' => 5,
                ],
                'required' => false
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer'
            ])
            
            
        ;


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Owner::class,
        

        ]);
    }
}

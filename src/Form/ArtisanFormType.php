<?php

namespace App\Form;

use App\Entity\Artisan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtisanFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('name', TextType::class, [ 
                'label' => 'Nom de l\'artisan',
                'required' => false
                ])
                ->add('address', TextareaType::class, [
                    'required' => true,
                    'label' => 'Adresse complète de l\'artisan',
                    'constraints' => [
                       new NotBlank([
                          'message' => 'Veuillez saisir une adresse'
                       ])
                    ]
                ])
                ->add('phone', Int::class, [
                    'label' => 'Télephone',
                    'required' => false,
                ])


                ->add('email', EmailType::class, [
                    'label' => 'Adresse e-mail',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'l\'adresse e-mail est obligatoire'
                        ]),
                        new Email([
                            'message' => 'Cet adresse e-mail est invalide'
                        ])
                ]
                ])
            
                ->add('description', TextareaType::class, [
                    'required' => false,
                    'label' => 'Description de l\'artisan'
                ])

                ->add('cover', ImageType::class, [
                    'required' => false,
                    'label' => 'image de couverture',
                    'download_label' => false,
                    'delete_label' => 'Cocher pour supprimer cette image',
                ])
                ->add('type', TextType::class,[
                    'label' => 'Nom de l\'artisan',
                'required' => false
            ])
            
            ->add('save', submitType::class, [
                'label' => 'Enregister'
            ])

            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => Artisan::class,
            ]);
        }
    }

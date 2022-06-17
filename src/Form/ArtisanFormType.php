<?php

namespace App\Form;

use App\Entity\Artisan;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

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
                ->add('phone', Integer::class, [
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

                ->add('cover', Image::class, [
                    'required' => false,
                    'label' => 'image de couverture',
                    'download_label' => false,
                    'delete_label' => 'Cocher pour supprimer cette image',
                ])
                ->add('type', TextType::class,[
                    'label' => 'Nom de l\'artisan',
                'required' => false
            ])
            
            ->add('save', SubmitType::class, [
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

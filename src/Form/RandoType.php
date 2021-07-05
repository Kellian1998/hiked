<?php

namespace App\Form;

use App\Entity\Rando;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RandoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
            'label' => 'Nom de la randonnée :',
            'attr' => [
                'class' => 'form-control mb-3',
                'id' => 'exampleInputName1',
            ]
            ])
            ->add('description', CKEditorType::class,[
                'label' => 'Description de la randonnée :',
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleTextarea1',
                ]
                ])
                ->add('longueur', IntegerType::class,[
                    'label' => 'Longueur de la randonnée (minutes) :',
                    'attr' => [
                        'class' => 'form-control mb-3',
                        'id' => 'exampleInputName1',
                    ]
                    ])
            ->add('difficulty', ChoiceType::class,[
                'label' => 'Difficulté de la randonnée :',
                'choices'  => [
                    'Difficile' => 'difficile',
                    'Moyen' => 'moyen',
                    'Simple' => 'simple',
                ],
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleFormControlSelect2',
                ]
                ])
                ->add('type', ChoiceType::class,[
                    'label' => 'Type de randonnée :',
                    'choices'  => [
                        'Sportive' => 'sportive',
                        'Détente' => 'dentente',
                        'Hédoniste' => 'hedoniste',
                    ],
                    'attr' => [
                        'class' => 'form-control mb-3',
                        'id' => 'exampleFormControlSelect2',
                    ]
                    ])
                    ->add('family', ChoiceType::class,[
                        'label' => 'Possible en famille ? :',
                        'choices'  => [
                            'Oui' => '1',
                            'Non' => '0',
                        ],
                        'attr' => [
                            'class' => 'form-control mb-3',
                            'id' => 'exampleFormControlSelect2',
                        ]
                        ])
                        ->add('couple', ChoiceType::class,[
                            'label' => 'Possible en couple ? :',
                            'choices'  => [
                                'Oui' => '1',
                                'Non' => '0',
                            ],
                            'attr' => [
                                'class' => 'form-control mb-3',
                                'id' => 'exampleFormControlSelect2',
                            ]
                            ])
                            ->add('solo', ChoiceType::class,[
                                'label' => 'Possible seul ? :',
                                'choices'  => [
                                    'Oui' => '1',
                                    'Non' => '0',
                                ],
                                'attr' => [
                                    'class' => 'form-control mb-3',
                                    'id' => 'exampleFormControlSelect2',
                                ]
                                ])
            ->add('start_lat', IntegerType::class,[
                'label' => 'Latitude du début :',
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleInputName1',
                ]
                ])
            ->add('start_long', IntegerType::class,[
                'label' => 'Longitude du début :',
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleInputName1',
                ]
                ])
            ->add('end_lat', IntegerType::class,[
                'label' => 'Latitude de fin :',
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleInputName1',
                ]
                ])
            ->add('end_long', IntegerType::class,[
                'label' => 'Longitude de fin :',
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleInputName1',
                ]
                ])
            ->add('zone', ChoiceType::class,[
                'label' => 'Zone géographique de la randonnée :',
                'choices'  => [
                    'Est' => 'est',
                    'Ouest' => 'ouest',
                    'Nord' => 'nord',
                    'Sud' => 'sud',
                ],
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleFormControlSelect2',
                ]
                ])
                ->add('milieu', ChoiceType::class,[
                    'label' => 'Milieu de la randonnée :',
                    'choices'  => [
                        'Mer' => 'mer',
                        'Montagne' => 'montagne',
                        'Plaine' => 'plaine',
                        'Hybride' => 'hybride',
                    ],
                    'attr' => [
                        'class' => 'form-control mb-3',
                        'id' => 'exampleFormControlSelect2',
                    ]
                    ])
            ->add('imageFile',  VichImageType::class, [
                'required' => false,
                'label' => 'Photo de la randonnée :',
                'attr' => [
                    'class' => 'form-control file-upload-info mb-3',
                    'type' => 'text',
                ],
                'data_class' => null,
            ])
            ->add('state', ChoiceType::class, [
                'label' => 'Publier la randonnée :',
                'choices'  => [
                    'Publier' => 1,
                    'Brouillon' => 0,
                ],
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'exampleFormControlSelect2',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Soumettre',
                'attr' => [
                    'class' => 'btn btn-primary mr-2 mb-3',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rando::class,
        ]);
    }
}

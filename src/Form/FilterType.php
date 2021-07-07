<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('difficulty', ChoiceType::class, [
                'label' => 'Difficulté',
                'choices'  => [
                    'Difficile' => 'difficile',
                    'Moyen' => 'moyen',
                    'Simple' => 'simple',
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de randonnée',
                'choices'  => [
                    'Sportive' => 'sportive',
                    'Détente' => 'detente',
                    'Hédoniste' => 'hedoniste',
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('zone', ChoiceType::class, [
                'label' => 'Zone de la randonnée',
                'choices'  => [
                    'Nord' => 'nord',
                    'Est' => 'est',
                    'Ouest' => 'ouest',
                    'Sud' => 'sud',
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('family', ChoiceType::class, [
                'label' => 'Vous souhaitez randonner en famille ?',
                'choices'  => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('couple', ChoiceType::class, [
                'label' => 'Vous souhaitez randonner en couple ?',
                'choices'  => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('alone', ChoiceType::class, [
                'label' => 'Vous souhaitez randonner seul ?',
                'choices'  => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('milieu', ChoiceType::class, [
                'label' => 'Dans quel milieu souhaitez vous randonner ?',
                'choices'  => [
                    'Mer' => 'mer',
                    'Montagne' => 'montagne',
                    'Plaine' => 'plaine',
                    'Hybride' => 'hybride',
                ],
                'attr' => [
                    'class' => 'form-control mt-2 mb-2',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Chercher ma randonnée Idéale !',
                'attr' => [
                    'class' => 'btn btn-danger mt-5 mb-5',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

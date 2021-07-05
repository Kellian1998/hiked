<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ModifUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles', ChoiceType::class,[
                'multiple' => true,
                'label' => 'Qualité de l\'utilisateur :',
                'choices'  => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Utilisateur' => 'ROLE_USER',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'exampleFormControlSelect2',
                ],
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Soumettre',
                    'attr' => [
                        'class' => 'btn btn-danger mt-3 mr-2',
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

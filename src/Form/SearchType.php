<?php

namespace App\Form;

use App\Entity\Rando;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('difficulty')
            ->add('start_lat')
            ->add('start_long')
            ->add('end_lat')
            ->add('end_long')
            ->add('zone')
            ->add('photo')
            ->add('state')
            ->add('type')
            ->add('family')
            ->add('couple')
            ->add('solo')
            ->add('longueur')
            ->add('milieu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rando::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RespondType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('objet', TextType::class, [
            'label' => " ",
            'attr' => [
                'placeholder' => "Object de votre message",
                'class' => 'form-control',
            'id' => 'exampleInputName1',
            ]
        ])
        ->add('content', TextareaType::class, [
            'label' => " ",
            'attr' => [
                'placeholder' => "Contenu de votre message",
                'class' => 'form-control',
                'id' => 'exampleTextarea1',
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => "Répondre",
            'attr' => [
                'class' => 'btn btn-danger mr-2',
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}

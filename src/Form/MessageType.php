<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Message;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
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
            ->add('dest', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                    ->orderBy('u.roles', 'ASC')
                    ->where('u.roles LIKE :role')
                    ->setParameter('role', '%"'.'ROLE_ADMIN'.'"%');
                },
                'choice_label' => 'prenom',
                'label' => " ",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'exampleFormControlSelect2',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Envoyer mon message",
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

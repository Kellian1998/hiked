<?php

namespace App\Form;

use App\Entity\Blog;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Titre de l\'article',
                    'class' => 'form-control',
                    'id' => 'exampleInputName1',
                ]
                ])
            ->add('content', CKEditorType::class,[
            'label' => ' ',
            ])
            ->add('category', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'name',
                'label' => " ",
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                    'id' => 'exampleFormControlSelect2',
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Image de présentation',
                    'class' => 'form-control file-upload-info mb-3',
                    'type' => 'text',
                ],
                'data_class' => null,
            ])
            ->add('published', ChoiceType::class, [
                'label' => ' ',
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
                    'class' => 'btn btn-danger mr-2',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}

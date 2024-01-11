<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('organisme', TextType::class, [
            'attr'=>[
                'placeholder'=>"Nom de l'organisme"
            ]
        ])
        // ->add('type', TextareaType::class, [
        //     'attr'=>[
        //         'placeholder'=>"Saisir une description du bien"
        //     ]
        // ])
        ->add('ville', TextType::class, [
            'attr' => [
                'placeholder' => "Exemple : Poissy"
            ]
        ])
        ->add('description', TextType::class, [
            'attr' => [
                'placeholder' => "Entrez une description"
            ]
        ])
        ->add('cp', TextType::class, [
            'attr' => [
                'placeholder' => "Exemple : 78300"
            ]
        ])
        ->add('image', TextType::class, [
            'attr'=>[
                'placeholder'=>"Saisir une URL d'image valide"
            ]
        ])
      
        // ->add('valider', SubmitType::class)
    ;
    }

    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => Annonce::class,
    //     ]);
    // }
}

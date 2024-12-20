<?php

namespace App\Form;

use App\Entity\Pays;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codeCio', TextType::class, options: [
                'label' => 'Code CIO :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('nomPays', TextType::class, options: [
                'label' => 'Nom :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('nomContinent', ChoiceType::class, [
                'label' => 'Continent :',
                'choices' => [
                    'Europe' => 'Europe',
                    'Afrique' => 'Afrique',
                    'Asie' => 'Asie',
                    'Amérique du nord' => 'Amérique du nord',
                    'Amérique du sud' => 'Amérique du sud',
                    'Océanie' => 'Océanie',
                    'Antarctique' => 'Antarctique'
                ],
                'data' => 'Europe',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('emblemePays', TextType::class, options: [
                'label' => 'Emblème :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pays::class,
        ]);
    }
}

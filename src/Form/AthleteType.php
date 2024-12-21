<?php

namespace App\Form;

use App\Entity\Athlete;
use App\Entity\Discipline;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AthleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrenom', TextType::class, options: [
                'label' => 'Nom & prénom :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('dateNaiss', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance :',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control mb-2'],
                'required' => false,
            ])
            ->add('photo', TextType::class, options: [
                'label' => 'Photo :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('genre', ChoiceType::class, [
                'label' => 'Genre :',
                'label_attr' => ['class' => 'form-label'],
                'choices' => [
                    'Masculin' => 'M',
                    'Féminin' => 'F',
                ],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('taille', NumberType::class, options: [
                'label' => 'Taille :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('poids', NumberType::class, options: [
                'label' => 'Poids :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'label' => 'Pays :',
                'choice_label' => 'nomPays',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('discipline', EntityType::class, [
                'class' => Discipline::class,
                'choice_label' => 'nomDis',
                'multiple' => true,
                'expanded' => true,
                'label' => ' ',
                'choice_attr' => function () {
                    return [
                        'class' => 'form-check-input',
                    ];
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Athlete::class,
        ]);
    }
}

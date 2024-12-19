<?php

namespace App\Form;

use App\Entity\Athlete;
use App\Entity\Discipline;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AthleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrenom')
            ->add('dateNaiss', null, [
                'widget' => 'single_text',
            ])
            ->add('photo')
            ->add('genre')
            ->add('taille')
            ->add('poids')
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'id',
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

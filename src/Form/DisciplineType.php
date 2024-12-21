<?php

namespace App\Form;

use App\Entity\Athlete;
use App\Entity\Discipline;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisciplineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomDis', TextType::class, options: [
                'label' => 'Nom :',
                'attr' => ['class' => 'form-control mt-2'],
                'required' => false
            ])
            ->add('sportDis', TextType::class, options: [
                'label' => 'Sport :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('descriptionDis', TextType::class, options: [
                'label' => 'Description :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('logoDis', TextType::class, options: [
                'label' => 'Logo :',
                'attr' => ['class' => 'form-control mt-2'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Discipline::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, options: [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('description', TextareaType::class, options: [
                'label' => 'Description',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('imageUrl', TextType::class, options: [
                'label' => 'Url de l\'image',
                'attr' => ['class' => 'form-control mt-2'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, options: [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control mt-2'],
                'required' => false,
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'label_attr' => ['class' => 'form-label'],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 3,
                ],
                'required' => false,
            ])
            ->add('imageUrl', TextType::class, options: [
                'label' => 'Url de l\'image',
                'attr' => ['class' => 'form-control mt-2'],
            ])
            ->add('User', EntityType::class, [
                'class' => User::class,
                'label' => 'Auteur',
                'choice_label' => 'fullName',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('categories', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => ' ',
                'choice_attr' => function () {
                    return [
                        'class' => 'form-check-input',
                    ];
                },
            ])
            // ->add('createdAt', DateType::class, [
            //     'widget' => 'single_text',
            //     'label' => 'Date d\'ouverture :',
            //     'label_attr' => ['class' => 'form-label'],
            //     'attr' => ['class' => 'form-control mb-2'],
            //     'required' => false,
            //     'data' => new \DateTimeImmutable(),
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

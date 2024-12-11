<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
=======
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
>>>>>>> 74af20af585d39f2467f022aeaec9473bbf8fc10

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            ->add('email', TextType::class, options: [
                'label' => 'E-mail',
                'attr' => ['class' => 'form-control mt-2'],
            ])
=======
            ->add('email')
>>>>>>> 74af20af585d39f2467f022aeaec9473bbf8fc10
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
<<<<<<< HEAD
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control mt-2'],
=======
                'attr' => ['autocomplete' => 'new-password'],
>>>>>>> 74af20af585d39f2467f022aeaec9473bbf8fc10
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    "Utilisateur-rice" => "ROLE_USER",
                    "Administrateur-tice" => "ROLE_ADMIN"
                ],
                'multiple' => "true",
                'expanded' => "true",
<<<<<<< HEAD
                'choice_attr' => function () {
                    return [
                        'class' => 'form-check-input ms-2 me-2',
                    ];
                },
=======
>>>>>>> 74af20af585d39f2467f022aeaec9473bbf8fc10
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 74af20af585d39f2467f022aeaec9473bbf8fc10

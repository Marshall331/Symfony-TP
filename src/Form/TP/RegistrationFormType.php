<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

// class RegistrationFormType extends AbstractType
// {
//     public function buildForm(FormBuilderInterface $builder, array $options): void
//     {
//         $builder
//             ->add('email', TextType::class, options: [
//                 'label' => 'E-mail',
//                 'attr' => ['class' => 'form-control mt-2'],
//             ])
//             ->add('plainPassword', PasswordType::class, [
//                 // instead of being set onto the object directly,
//                 // this is read and encoded in the controller
//                 'mapped' => false,
//                 'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control mt-2'],
//                 'constraints' => [
//                     new NotBlank([
//                         'message' => 'Please enter a password',
//                     ]),
//                     new Length([
//                         'min' => 6,
//                         'minMessage' => 'Your password should be at least {{ limit }} characters',
//                         // max length allowed by Symfony for security reasons
//                         'max' => 4096,
//                     ]),
//                 ],
//             ])
//             ->add('roles', ChoiceType::class, [
//                 'choices' => [
//                     "Utilisateur-rice" => "ROLE_USER",
//                     "Administrateur-tice" => "ROLE_ADMIN"
//                 ],
//                 'multiple' => "true",
//                 'expanded' => "true",
//                 'choice_attr' => function () {
//                     return [
//                         'class' => 'form-check-input ms-2 me-2',
//                     ];
//                 },
//             ])
//         ;
//     }

//     public function configureOptions(OptionsResolver $resolver): void
//     {
//         $resolver->setDefaults([
//             'data_class' => Member::class,
//         ]);
//     }
// }
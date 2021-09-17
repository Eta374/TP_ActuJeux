<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameUser')
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                'Administrateur' => User::ROLE_ADMIN,
                'Utilisateur' => User::ROLE_USER,
                'Editeur' => User::ROLE_EDITOR,
                ],
                'multiple' => true,
                'expanded' => true,
                'required' => true,
                ])
               
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameContact', TextType::class, [
                'label'=> 'Votre nom : ',
                'attr' => [
                    'placeholder' => 'Saisir votre nom',
                ],
                
            ])
            ->add('lastnameContact', TextType::class, [
                'label'=> 'Votre Prénom : ',
                'attr' => [
                    'placeholder' => 'Saisir votre Prénom',
                ],
            ])
            ->add('emailContact', TextType::class, [
                'label'=> 'Votre Email : ',
                'attr' => [
                    'placeholder' => 'Saisir votre Email',
                ],
            ])
            ->add('telContact', TextType::class, [
                'label'=> 'Votre Téléphone : ',
                'attr' => [
                    'placeholder' => 'Saisir votre Téléphone',
                ],
            ])
            ->add('messageContact', TextareaType::class, [
                'label'=> 'Votre Message : ',
                'attr' => [
                    'placeholder' => 'Saisir votre Message',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

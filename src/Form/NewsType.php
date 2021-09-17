<?php

namespace App\Form;

use App\Entity\News;
use App\Entity\Genres;
use App\Entity\Platform;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleNews')
            ->add('imgNews', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document
               valide',
                    ])
                ],
            ])

            ->add('videoNews')
            ->add('textNews', CKEditorType::class)
            ->add('genres', EntityType::class, [
                'class' => Genres::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'nameGenre',
            ])
            ->add('platform', EntityType::class, [
                'class' => Platform::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'platPlatform',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}

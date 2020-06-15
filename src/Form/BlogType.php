<?php

namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title')
            ->add('Text', CKEditorType::class, array(
        'config' => array(
            'uiColor' => '#ffffff'
        )))
            ->add('Summary')
            ->add('Active')
            ->add('imageFile', VichFileType::class, array(
              'label' => "Image (PNG)",
              'required' => false,
              'allow_delete' => true, // not mandatory, default is true
              'download_uri' => true, // not mandatory, default is true
          ))
            ->add('Createdate')
            ->add('Editdate')
            ->add('Madeby')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}

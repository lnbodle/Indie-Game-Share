<?php

namespace App\Form;

use App\Entity\PostSearch;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('field', SearchType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => "Search here"
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'required' => false,
                'label' => false,
                'placeholder' => 'Choose a category'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PostSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}

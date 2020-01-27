<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Category1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,[
                'attr' =>
                ['class' => 'form-control',
                    'placeholder' => 'Libelle']
            ])
            ->add('qte',IntegerType::class,[
                'attr' =>
                    ['class' => 'form-control',
                        'placeholder' => 'Quantité']
            ])
            ->add('prix',IntegerType::class,[
            'attr' =>
                ['class' => 'form-control',
                    'placeholder' => 'Prix Unitaire']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}

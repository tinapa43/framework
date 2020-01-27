<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,[
        'attr' =>
            ['class' => 'form-control',
                'placeholder' => 'Libelle']
    ])
            ->add('qte',\Symfony\Component\Form\Extension\Core\Type\IntegerType::class,[
        'attr' =>
            ['class' => 'form-control',
                'placeholder' => 'Quantite']
    ])
            ->add('prix',\Symfony\Component\Form\Extension\Core\Type\IntegerType::class,[
                'attr' =>
                    ['class' => 'form-control',
                        'placeholder' => 'Prix']
            ])
            ->add('category',EntityType::class,
                ['choice_label' => 'libelle', 'class' => 'App\Entity\Category',
                    'attr' =>
                        ['class' => 'form-control',
                            'placeholder' => 'Nom du client']
                    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class,[
                'widget' => 'single_text',
                'label' => 'Date de Naissance',
                'required' => true,
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'jj/mm/aaaa ex: 21/03/2017',
                ],
                'constraints' => [new DateTime()],
            ])
            ->add('qteComm',IntegerType::class,
                [
                    'attr' =>
                        ['class' => 'form-control','placeholder' => 'Quantite']
                ])
            ->add('client',EntityType::class,[
                'class' => 'App\Entity\Client',
                'choice_label' => 'nom',
                'attr' =>
                    ['class' => 'form-control']
            ])
            ->add('produit',EntityType::class,[
                'class' => 'App\Entity\Produit',
                'choice_label' => 'libelle',
                'attr' =>
                    ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}

<?php

namespace App\Form\Type;

use App\DTO\IndexFormDTO;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class IndexFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', EntityType::class, [
                'required' => true,
                'label' => 'Select product',
                'class' => Product::class,
            ])
            ->add('taxCode', options: [
                'required' => true,
                'label' => 'Tax code',
                'attr' => [
                    'placeholder' => 'AA000000000',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Get price',
            ])
        ;
    }

    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'POST',
            'csrf_protection' => false,
            'data_class' => IndexFormDTO::class,
        ]);
    }
}

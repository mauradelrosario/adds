<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class AddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
            'title',
            TextType::class,
            [
                'constraints' => [ new NotBlank(), new NotNull()],
                'required'  => true
            ]
        )
            ->add(
                'description',
                TextType::class,
                [
                    'constraints' => [ new NotBlank(), new NotNull()],
                    'required'  => true
                ]
            )
            ->add(
                'type',
                ChoiceType::class,
                [
                    'choices'   => [
                        'Emploi'        => true,
                        'Immobilier'    => false,
                        'Automobile'    => false,
                    ],
                    'required'  => false
                ]
            )
            ->add(
                'salary',
                NumberType::class,
                [
                    'required'  => false
                ]
            )
            ->add(
                'contract',
                TextType::class,
                [
                    'required'  => false
                ]
                )
            ->add(
                'fuel',
                TextType::class,
                [
                    'required'  => false
                ]
            )
            ->add(
                'price',
                NumberType::class,
                [
                    'required'  => false
                ]
                )
            ->add('surface',
                NumberType::class,
                [
                    'required'  => false
                ]
            );
    }
}
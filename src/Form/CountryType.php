<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'country',
                ChoiceType::class,
                [
                    'choices' => array_flip(\App\Entity\User\CountryType::COUNTRIES),
                    'choice_label' => function ($choice, $key, $value) {
                        return \App\Entity\User\CountryType::COUNTRIES[$value];
                    },
                    'autocomplete' => true,
                ],
            );
    }
}
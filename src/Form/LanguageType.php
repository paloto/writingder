<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class LanguageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'language',
                ChoiceType::class,
                [
                    'choices' => array_flip(\App\Entity\User\LanguageType::LANGUAGES),
                    'choice_label' => function ($choice, $key, $value) {
                        return \App\Entity\User\LanguageType::LANGUAGES[$value];
                    },
                    'autocomplete' => true,
                ],
            );
    }
}
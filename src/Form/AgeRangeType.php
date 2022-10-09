<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class AgeRangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'range',
                ChoiceType::class,
                [
                    'choices' => \App\Entity\User\AgeRangeType::getConstants(),
                    'autocomplete' => true,
                ],
            );
    }
}
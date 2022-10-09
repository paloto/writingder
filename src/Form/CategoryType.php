<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'category',
                ChoiceType::class,
                [
                    'choices' => \App\Entity\User\CategoryType::getConstants(),
                    'autocomplete' => true,
                ],
            );
    }
}
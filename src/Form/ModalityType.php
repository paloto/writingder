<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ModalityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'modality',
                ChoiceType::class,
                [
                    'choices' => \App\Entity\User\ModalityType::getConstants(),
                    'autocomplete' => true,
                ],
            );
    }
}
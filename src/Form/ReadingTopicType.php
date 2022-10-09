<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ReadingTopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'reading_topic',
                ChoiceType::class,
                [
                    'choices' => \App\Entity\User\TopicType::getConstants(),
                    'autocomplete' => true,
                    'multiple' => true,
                ],
            );
    }
}
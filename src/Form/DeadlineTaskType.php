<?php

namespace App\Form;

use App\Entity\DeadlineTask;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeadlineTaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('deadline', DateTimeType::class, array(
            	'widget' => 'single_text',
				'format' => 'yyyy-MM-dd\'T\'HH:mm:ss'
			))
            ->add('duration', IntegerType::class)
            ->add('description', TextareaType::class)
            ->add('done', CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DeadlineTask::class,
			'csrf_protection'    => false,
        ]);
    }
}

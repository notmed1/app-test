<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('last_name', TextType::class, [
                'label' => 'label.last_name',
                'disabled' => true,
            ])
            ->add('first_name', TextType::class, [
                'label' => 'label.first_name',
                'disabled' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'label.email',
            ])
            ->add('birthday_date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

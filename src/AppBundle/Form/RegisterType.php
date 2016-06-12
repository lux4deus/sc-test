<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('_username', TextType::class, array('placeholder' => 'Логин'));
			->add('_password', PasswordType::class, array('placeholder' => 'Пароль'));
			->add('_confirm', PasswordType::class, array('placeholder' => 'Повторите пароль'));
			->add('_email', EmailType::class, array('placeholder' => 'E-mail'));
			->add('save', SubmitType::class, array('label' => 'Войти'));
    }

    public function configureOptions (OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
    }
}

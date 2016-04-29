<?php

namespace Hap\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Util\LegacyFormHelper;
//use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options);
        // add your custom field
        $builder
            ->add('name','text',array('label' => 'Nombre:','attr' => array('class' => 'form-control')))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle','attr' => array('class' => 'form-control')))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle','attr' => array('class' => 'form-control')))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle','attr' => array('class' => 'form-control')),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch'))
            ->add('roles', 'choice', array('label' => 'Rol', 'required' => true,'attr' => array('class' => 'form-control'),
                           'choices' => array( 'ROLE_ADMIN' => 'ADMINISTRADOR','ROLE_SUPERADMIN' => 'SUPERADMINISTRADOR', 
                                               'ROLE_USER' => 'USUARIO','ROLE_ADMIN_SOPORTE' => 'ADMIN SOPORTE','ROLE_SOPORTE' => 'SOPORTE','ROLE_ADMIN_SERVICIO' => 'ADMIN SERVICIO','ROLE_SERVICIO' => 'SERVICIO'), 'multiple' => true));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}


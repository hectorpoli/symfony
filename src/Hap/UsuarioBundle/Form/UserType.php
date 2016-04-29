<?php

namespace Hap\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array('disabled' => true,'label' => 'Nombre:'))
            ->add('roles', 'choice', array('label' => 'Permisos', 'required' => true,
                            'attr' => array('style' => 'width:400px;height:130px;'),
                           'choices' => array( 'ROLE_ADMIN' => 'ADMINISTRADOR','ROLE_SUPERADMIN' => 'SUPERADMINISTRADOR', 
                                               'ROLE_USER' => 'USUARIO','ROLE_SOPORTE' => 'SOPORTE','ROLE_DESARROLLO' => 'DESARROLLO'), 'multiple' => true));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\UsuarioBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'hap_usuariobundle_user';
    }
}

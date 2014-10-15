<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'options' => array(),
                'required' => true,
                'first_options'  => array('label' => 'form.password.first_new'),
                'second_options' => array('label' => 'form.password.second_new'),
            ));
    }

    public function getName()
    {
        return 'mgn_userbundle_changepasswordtype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\User',
        );
    }
}

<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminProfilePasswordType extends AbstractType
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $config = $this->container->get('mgn.config');

        $builder->add('password', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'form.registration.password'),
                'second_options' => array('label' => 'form.registration.password_confirmation'),
                'required' => false,
                'invalid_message' => 'Les mots de passe ne correspondent pas',
            ));

        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'mgn_userbundle_adminprofilePasswordtype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\User',
        );
    }
}

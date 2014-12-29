<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminProfileSecurityType extends AbstractType
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $config = $this->container->get('mgn.config');

        $builder->add('isActive', 'checkbox', array('required'  => false,));

        $builder->add('locked', 'checkbox', array('required'  => false,));
        $builder->add('lockedFor', 'text', array('required' => false));

        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'mgn_userbundle_adminprofileSecuritytype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\User',
        );
    }
}

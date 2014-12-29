<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminProfileAvatarType extends AbstractType
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $config = $this->container->get('mgn.config');

        $builder->add('avatar', 'choice', array(
                        'choices'   => array(
                            'default'   => 'Défaut',
                            'gravatar' => 'Gravatar',
                        ),
                        'multiple'  => false,
                        'expanded'  => true
                    ));

        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'mgn_userbundle_adminprofileavatartype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\User',
        );
    }
}

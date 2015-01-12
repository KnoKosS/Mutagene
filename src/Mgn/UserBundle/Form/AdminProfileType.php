<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminProfileType extends AbstractType
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $config = $this->container->get('mgn.config');

        $builder->add('username',    'text', array('required' => false));

        $builder->add('email',    'text', array('required' => false));

        $builder->add('emailVisible', 'checkbox', array('required'  => false,));
        
        if( $config->get('profileFirstName') === true )
        {
            $builder->add('firstName',    'text', array('required' => false));
        }
        
        if( $config->get('profileLastName') === true )
        {
            $builder->add('lastName',    'text', array('required' => false));
        }
        
        if( $config->get('profileBirthday') === true )
        {
            $builder->add('birthday', 'date', array('widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'required' => false));
        }
        
        if( $config->get('profileCity') === true )
        {
            $builder->add('city',    'text', array('required' => false));
        }
        
        if( $config->get('profileWebsite') === true )
        {
            $builder->add('website',    'text', array('required' => false));
        }
        
        if( $config->get('profileSignature') === true )
        {
           $builder->add('signature', 'textarea', array('required' => false));
        }
        
        if( $config->get('profileBiography') === true )
        {
           $builder->add('biography', 'textarea', array('required' => false));
        }

        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'mgn_userbundle_adminprofiletype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\User',
        );
    }
}

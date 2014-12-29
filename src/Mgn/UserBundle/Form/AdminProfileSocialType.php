<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminProfileSocialType extends AbstractType
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $config = $this->container->get('mgn.config');
        
        if( $config->get('profileFacebook') === true )
        {
            $builder->add('facebook', 'text', array('required' => false));
        }
        
        if( $config->get('profileTwitter') === true )
        {
            $builder->add('twitter', 'text', array('required' => false));
        }
        
        if( $config->get('profileLinkedin') === true )
        {
            $builder->add('linkedin', 'text', array('required' => false));
        }
        
        if( $config->get('profileSteam') === true )
        {
            $builder->add('steam', 'text', array('required' => false));
        }
        
        if( $config->get('profileGoogleplus') === true )
        {
            $builder->add('googleplus', 'text', array('required' => false));
        }
        
        if( $config->get('profileTwitch') === true )
        {
            $builder->add('twitch', 'text', array('required' => false));
        }
        
        if( $config->get('profileYoutube') === true )
        {
            $builder->add('youtube', 'text', array('required' => false));
        }
        
        if( $config->get('profilePinterest') === true )
        {
            $builder->add('pinterest', 'text', array('required' => false));
        }

        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'mgn_userbundle_adminprofilesocialtype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\User',
        );
    }
}

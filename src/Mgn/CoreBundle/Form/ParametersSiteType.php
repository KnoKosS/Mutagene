<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametersSiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add('siteTitle',    'text')
            ->add('siteDescription',    'text')
            ->add('email',    'text')
            ->add('siteFacebook',    'text', array('required'  => false,))
            ->add('siteTwitter',    'text', array('required'  => false,))
            ->add('siteSteam',    'text', array('required'  => false,))
            ->add('siteGoogleplus',    'text', array('required'  => false,))
            ->add('siteTwitch',    'text', array('required'  => false,))
            ->add('siteYoutube',    'text', array('required'  => false,))
            
            ->add('save', 'submit');
            ;
    }

    public function getName()
    {
        return 'parameters_site_type';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Config',
        );
    }
}

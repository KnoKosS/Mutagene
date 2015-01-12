<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametersUsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
            ->add('profileFirstName', 'checkbox', array('required'  => false,))
            ->add('profileLastName', 'checkbox', array('required'  => false,))
            ->add('profileBirthday', 'checkbox', array('required'  => false,))
            ->add('profileCity', 'checkbox', array('required'  => false,))
            ->add('profileWebsite', 'checkbox', array('required'  => false,))
            ->add('profileSignature', 'checkbox', array('required'  => false,))
            ->add('profileFacebook', 'checkbox', array('required'  => false,))
            ->add('profileTwitter', 'checkbox', array('required'  => false,))
            ->add('profileLinkedin', 'checkbox', array('required'  => false,))
            ->add('profileSteam', 'checkbox', array('required'  => false,))
            ->add('profileGoogleplus', 'checkbox', array('required'  => false,))
            ->add('profileTwitch', 'checkbox', array('required'  => false,))
            ->add('profileYoutube', 'checkbox', array('required'  => false,))
            ->add('profilePinterest', 'checkbox', array('required'  => false,))
            ->add('save', 'submit');
            ;
    }

    public function getName()
    {
        return 'parameters_users_type';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Config',
        );
    }
}

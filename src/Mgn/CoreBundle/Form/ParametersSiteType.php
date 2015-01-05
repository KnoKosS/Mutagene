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

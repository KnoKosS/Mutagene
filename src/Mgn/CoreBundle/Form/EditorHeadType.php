<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditorHeadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add('head', 'textarea', array('required'  => false,))
            ;
    }

    public function getName()
    {
        return 'mgn_corebundle_EditorHeadtype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Theme',
        );
    }
}

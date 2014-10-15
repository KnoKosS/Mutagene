<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditorJavascriptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add('javascript', 'textarea', array('required'  => false,))
            ;
    }

    public function getName()
    {
        return 'mgn_corebundle_EditorJavascripttype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Theme',
        );
    }
}

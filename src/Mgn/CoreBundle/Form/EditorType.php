<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditorType extends AbstractType
{
 
    protected $file;
 
    function __construct($file) {
        $this->file = $file;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add(''.$this->file.'', 'textarea', array('required'  => false,))
            ;
    }

    public function getName()
    {
        return 'mgn_corebundle_Editortype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Theme',
        );
    }
}

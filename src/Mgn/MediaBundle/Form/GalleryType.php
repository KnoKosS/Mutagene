<?php
namespace Mgn\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GalleryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
	    	->add('name',    'text')
            ->add('url',    'text', array('required'  => false,))
            ->add('description',    'textarea', array('required'  => false,))
            ->add('publicAclView', 'checkbox', array('required'  => false,))
            ;
    }

    public function getName()
    {
        return 'mgn_articlebundle_categorytype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\ArticleBundle\Entity\Category',
        );
    }
}

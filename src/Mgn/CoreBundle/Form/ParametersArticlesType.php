<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametersArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
            ->add('cmsArticle', 'checkbox', array('required'  => false,))
            ->add('articleIndexHeader', 'checkbox', array('required'  => false,))
            
            ->add('save', 'submit');
            ;
    }

    public function getName()
    {
        return 'parameters_articles_type';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Config',
        );
    }
}

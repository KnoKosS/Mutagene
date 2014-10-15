<?php
namespace Mgn\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',    'text')
            ->add('sort',    'text')
            ->add('description',    'textarea', array('required'  => false,))
            ;
    }

    public function getName()
    {
        return 'mgn_forumbundle_categorytype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\ForumBundle\Entity\Category',
        );
    }
}

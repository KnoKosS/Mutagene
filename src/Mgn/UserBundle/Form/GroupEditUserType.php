<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GroupEditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('function', 'text', array(
                'required' => true,
            ))
            ->add('save', 'submit')
            ;
    }

    public function getName()
    {
        return 'mgn_userbundle_groupaddusertype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\UserBundle\Entity\UserToGroup',
        );
    }
}

<?php
namespace Mgn\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GroupAddUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('function', 'text', array(
                'required' => true,
            ))
            ->add('user', 'entity', array(
                                        'class' => 'MgnUserBundle:User', 
                                        'property' => 'username',
                                        'query_builder' => function (EntityRepository $repository) 
                                        {
                                            $qb = $repository->createQueryBuilder('u');
                                            $qb->add('where', 'u.isActive = 1'); 
                                            $qb->add('orderBy', 'u.username'); 
                                            return $qb;
                                        },
                                        'preferred_choices' => array(),
                                        ))
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

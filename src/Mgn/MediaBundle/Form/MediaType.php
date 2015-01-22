<?php
namespace Mgn\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file',    'file')
            ->add('title', 'text', array('required'  => false,))
            ->add('description', 'textarea', array('required'  => false,))
            ->add('gallery', 'entity', array(
                                        'class' => 'MgnMediaBundle:Gallery', 
                                        'property' => 'name',
                                        'query_builder' => function ($repository) 
                                        {
                                            $qb = $repository->createQueryBuilder('g'); 
                                            $qb->add('orderBy', 'g.name'); 
                                            return $qb;
                                        },
                                        'preferred_choices' => array(),
                                        ))
            ;
    }

    public function getName()
    {
        return 'mgn_mediabundle_mediatype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\MediaBundle\Entity\Media',
        );
    }
}

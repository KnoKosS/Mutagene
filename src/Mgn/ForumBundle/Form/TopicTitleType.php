<?php
namespace Mgn\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class TopicTitleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add('title',    'text')
            ;
    }

    public function getName()
    {
        return 'mgn_forumbundle_topictitletype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\ForumBundle\Entity\Topic',
        );
    }
}

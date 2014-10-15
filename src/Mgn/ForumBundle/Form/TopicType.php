<?php
namespace Mgn\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Mgn\MessageBundle\Form\MessageType;

class TopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add('title',    'text')
            ->add('lastMessage',     new MessageType())
            ;
    }

    public function getName()
    {
        return 'mgn_forumbundle_topictype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\ForumBundle\Entity\Topic',
        );
    }
}

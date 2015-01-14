<?php
namespace Mgn\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametersForumsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
            ->add('cmsForum', 'checkbox', array('required'  => false,))
            ->add('forumPostPage', 'hidden')
            ->add('forumTopicPage', 'hidden')
            ->add('forumIndexLigne', 'choice', array(
                    'choices'   => array('1' => '1', '2' => '2', '3' => '3', '4' => '4'),
                    'expanded'  => true,
                    'multiple'  => false,
                ))
            ->add('forumAppearance', 'choice', array(
                    'choices'   => array('Classic' => 'Classique', 'Bloc' => 'Bloc', 'Next' => 'Next'),
                    'required'  => true,
                ))
            ->add('forumLastMessageAvatarView', 'checkbox', array('required'  => false,))
            ->add('forumCounting', 'checkbox', array('required'  => false,))
            ->add('save', 'submit');
            ;
    }

    public function getName()
    {
        return 'parameters_forums_type';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\CoreBundle\Entity\Config',
        );
    }
}

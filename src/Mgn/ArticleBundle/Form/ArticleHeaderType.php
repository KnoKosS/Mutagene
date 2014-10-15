<?php
namespace Mgn\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleHeaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('header',    'text')
            ;
    }

    public function getName()
    {
        return 'mgn_articlebundle_articleheadertype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\ArticleBundle\Entity\Article',
        );
    }
}

<?php
namespace Mgn\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url',    'text', array('required'  => false,))
            ->add('comments', 'choice', array(
                            'choices' => array(true => 'Activé', false => 'Désactivé')
                        ))
            ->add('date',    'datetime', array(
                                            'date_widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'required' => true,
                                            'time_widget' => 'single_text', 'format' => 'hh:mm', 'required' => true
                                            ))
            ->add('category', 'entity', array(
                                        'class' => 'MgnArticleBundle:Category', 
                                        'property' => 'name',
                                        'query_builder' => function ($repository) 
                                        {
                                            $qb = $repository->createQueryBuilder('c'); 
                                            $qb->add('orderBy', 'c.name'); 
                                            return $qb;
                                        },
                                        'preferred_choices' => array(),
                                        ))
            ->add('author', 'entity', array(
                                        'class' => 'MgnUserBundle:User', 
                                        'property' => 'username',
                                        'query_builder' => function ($repository) 
                                        {
                                            $qb = $repository->createQueryBuilder('u');
                                            $qb->add('where', 'u.isActive = 1'); 
                                            $qb->add('orderBy', 'u.username'); 
                                            return $qb;
                                        },
                                        'preferred_choices' => array(),
                                        ))
            ->add('status', 'choice', array(
                    'choices'   => array('daft' => 'Brouillon', 'publish' => 'Publier'),
                    'multiple'  => false,
                ))
            ;
    }

    public function getName()
    {
        return 'mgn_articlebundle_articletype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\ArticleBundle\Entity\Article',
        );
    }
}

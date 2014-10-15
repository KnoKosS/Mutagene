<?php
namespace Mgn\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class PictureArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file',    'file')
            ;
    }

    public function getName()
    {
        return 'mgn_mediabundle_picturearticletype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Mgn\MediaBundle\Entity\Picture',
        );
    }
}

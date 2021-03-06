<?php
namespace Biz\ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProfileType extends AbstractType
{

    /**
     *
     * @param FormBuilderInterface $builder            
     * @param array $options            
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('gender')->add('birthday', 'date', array(
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd'
        ));
    }

    /**
     *
     * @param OptionsResolverInterface $resolver            
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dat\UserBundle\Entity\Profile',
            'csrf_protection' => false
        ));
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return '';
    }
}

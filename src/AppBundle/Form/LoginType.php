<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('sshKey', null, [
                'attr' => [
                    'help-block' => 'The text of a PEM file used for login'
                ]
            ])
            ->add('hostname', null, [
                'attr' => [
                    'help-block' => 'DNS name for this login'
                ]
            ])
            ->add('port')
            ->add('url')
        ;
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options.
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Login'
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_login';
    }
}

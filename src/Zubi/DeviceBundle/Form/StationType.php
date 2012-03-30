<?php

namespace Zubi\DeviceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class StationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('hash')
            ->add('version')
            ->add('country')
            ->add('city')
            ->add('street')
            ->add('longitude')
            ->add('latitude')
        ;
    }

    public function getName()
    {
        return 'zubi_devicebundle_stationtype';
    }
}

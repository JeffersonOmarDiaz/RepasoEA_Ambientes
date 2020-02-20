<?php

namespace App\Form;

use App\Entity\Productos;
use App\Entity\Servicio;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServicioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion')
            ->add('comentario')
            ->add('calificacion')
            ->add('servicio', EntityType::class, [
                'class' => Productos::class,
                'choice_label' => 'nombre'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Servicio::class,
        ]);
    }
}

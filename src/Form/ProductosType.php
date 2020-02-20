<?php

namespace App\Form;

use App\Entity\Productos;
use App\Entity\Categoria;
use App\Entity\Localidad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ProductosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('precio')

            ->add('categoria', EntityType::class, [
                'class' => Categoria::class,
                'choice_label' => 'nombre'
            ])

            ->add('localidad', EntityType::class, [
                'class' => Localidad::class,
                'choice_label' => 'pais'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Productos::class,
        ]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: carlosgude
 * Date: 29/10/14
 * Time: 9:32
 */

namespace Argidomin\AppBundle\Admin\Adjuntos;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class SliderAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre','text',['label' => 'Nombre Identificativo',
                'help' => 'Indique un nombre para identificar el slider'])
            ->add('imagenes','sonata_type_model', ['multiple' => true,
                                                   'by_reference' => false,
                                                   'label' => 'Imagenes',
                                                   'required' => true])
            ->add('descripcion','text',['label' => 'Descripción breve del slider',])
            ->add('estado','choice',['choices'=>[true => 'Activo',
                false => 'Desactivado']])
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre',null, ['label' => 'Nombre de la imagen'])
            ->add('descripcion',null,['label' => 'Descripción breve del archivo',])
        ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombre',null, ['label' => 'Nombre de la imagen'])
            ->add('descripcion',null,['label' => 'Descripción breve del archivo',])
            ->add('imagenes')
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])

        ;

    }

}


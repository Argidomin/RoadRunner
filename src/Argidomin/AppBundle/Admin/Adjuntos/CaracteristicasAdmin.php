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


class CaracteristicasAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titulo','text',['label' => 'Nombre Identificativo'])
            ->add('imagenes','sonata_type_model', ['by_reference' => false,
                'label' => 'Imagenes',
                'required' => true])
            ->add('cuerpo', 'textarea', ['attr' =>['class' => 'tinymce',
                'tinymce'=>'{"theme":"simple"}'], ])
            ->add('orden','text',['help' => 'Orden en el que seran mostrados',
                                  'required'=> null])
            ->add('estado','choice',['choices'=>[true => 'Activo',
                false => 'Desactivado']])
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titulo',null, ['label' => 'Nombre de la imagen'])
            ->add('cuerpo',null,['label' => 'Descripción breve del archivo',])
        ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo',null, ['label' => 'Nombre de la imagen'])
            ->add('cuerpo',null,['label' => 'Descripción breve del archivo',])
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])

        ;

    }

}


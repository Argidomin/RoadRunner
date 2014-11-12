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


class VideosAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titulo','text',['label' => 'Titulo del video',
                                   'help' => 'Indique un nombre para identificar el archivo'])
            ->add('textoAlt','text',['label' => 'Texto alternativo',
                                     'help'=> 'En caso de que el video no esté disponible, se mostrara este texto'])
            ->add('descripcion','text',['label' => 'Descripción breve del video',])
            ->add('url','text',['label' => 'Idique la url del video',
                                'help' => 'Indique la URL completa del video'])
            ->add('estado','choice',['choices'=>[true => 'Activo',
                false => 'Desactivado']])
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titulo',null,['label' => 'Titulo del video'])
            ->add('textoAlt',null,['label' => 'Texto alternativo'])
            ->add('descripcion',null,['label' => 'Descripción breve del video'])
            ->add('url',null)
        ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo',null,['label' => 'Titulo del video'])
            ->add('textoAlt',null,['label' => 'Texto alternativo'])
            ->add('descripcion',null,['label' => 'Descripción breve del video'])
            ->add('url',null)
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])
            ->add('estado',null,['label'=> '¿Activado?'])

        ;

    }
} 
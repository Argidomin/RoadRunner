<?php

namespace Argidomin\AppBundle\Admin\Menus;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class MenusAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Menus de la web')
                ->add('titulo', 'text', ['label' => 'Nombre del menu'])
                ->add('cuerpo', 'textarea', ['attr' =>['class' => 'tinymce',
                                                       'tinymce'=>'{"theme":"simple"}'],
                                                       'label' =>'Descripción del menu' ])
                ->add('estado','choice',['choices'=>[true => 'Activo',
                                                     false => 'Desactivado']])
            ->end()
        ;

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo', null, ['label' => 'Nombre del menú'])
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])
            ->add('estado',null,['label'=> '¿Activado?']);

    }

}
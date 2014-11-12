<?php

namespace Argidomin\AppBundle\Admin\Menus;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class MensajesAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Menus de la web')
                ->add('emailOrigen', 'email', ['label' => 'Email de Contacto',
                    'read_only' => true])
                ->add('nombre','text',['label' => 'Nombre',
                    'read_only' => true,])
                ->add('empresa','text',['label' => 'Empresa',
                    'read_only' => true])
                ->add('telefono','text',['label' => 'Telefono',
                    'read_only' => true,])
                ->add('producto', 'text', ['label' => 'Producto',
                    'read_only' => true])
                ->add('asunto', 'text', ['label' => 'Consulta',
                                         'read_only' => true])
                ->add('cuerpo','textarea',['label' => 'Cuerpo del mensaje',
                                           'read_only' => true])
                ->add('estado','choice',['choices' => [false => 'No leida',
                                                       true =>'Leida']]);

    }


    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('emailOrigen', null, ['label' => 'Email de contacto'])
            ->add('nombre', null, ['label' => 'Nombre'])
            ->add('empresa', null, ['label' => 'Empresa'])
            ->add('telefono', null, ['label' => 'Telefono'])
            ->add('fechaCreacion',null,['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado',null,['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])
            ->add('estado',null,['label'=> '¿leida?']);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('emailOrigen', null, ['label' => 'Email de contacto'])
            ->add('nombre', null, ['label' => 'Nombre'])
            ->add('empresa', null, ['label' => 'Empresa'])
            ->add('telefono', null, ['label' => 'Telefono'])
            ->add('fechaCreacion', null, ['format' => 'd/m/y h:m', 'label' => 'Fecha de creación'])
            ->add('fechaActualizado', null, ['format' => 'd/m/y h:m', 'label' => 'Fecha de modificacion'])
            ->add('estado', null, ['label' => '¿leida?']);
    }

}
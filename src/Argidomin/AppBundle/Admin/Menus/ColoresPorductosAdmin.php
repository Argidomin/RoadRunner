<?php
/**
 * Created by PhpStorm.
 * User: carlosgude
 * Date: 1/11/14
 * Time: 23:00
 */

namespace Argidomin\AppBundle\Admin\Menus;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class ColoresPorductosAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('colorHEX', 'text', ['label' => 'Color en formato HEX',
                'help' => 'El formato debe de ser #XXXXXX'])
            ->add('color', 'text', ['label' => 'Indique el nombre del color'])
            ->add('imagenes','sonata_type_model', ['multiple' => false,
                'by_reference' => false,
                'label' => 'Imagen del producto',
                'required' => false])
            ->add('imagenesMiniatura','sonata_type_model', ['multiple' => false,
                'by_reference' => false,
                'label' => 'Miniatura del producto',
                'required' => false])
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('colorHEX', null, ['label' => 'Color en formato HEX'])
            ->add('color', null, ['label' => 'Indique el nombre del color']);

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('colorHEX', 'text', ['label' => 'Color en formato HEX'])
            ->add('color', 'text', ['label' => 'Indique el nombre del color'])

        ;

    }
} 
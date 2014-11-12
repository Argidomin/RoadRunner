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


class ImagenesAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombreId','text',['label' => 'Nombre Identificativo',
                'help' => 'Indique un nombre para identificar el archivo'])
            ->add('ordenSlider','text', ['required' => false])
            ->add('imagen','file')
            ->add('nombre','text', ['label' => 'Nombre de la imagen'])
            ->add('descripcion','text',['label' => 'Descripción breve del archivo',])
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombreID',null,['label' => 'Nombre Identificativo',
                'help' => 'Indique un nombre para identificar el archivo'])
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
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])

        ;

    }

    public function prePersist($entidad) {
        $this->manageFileUpload($entidad);
    }

    public function preUpdate($entidad) {
        $this->manageFileUpload($entidad);
    }

    private function manageFileUpload($entidad) {
        if ($entidad->getImagen()) {
            $entidad->upload();
        }
    }
} 
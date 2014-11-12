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


class PdfSeguridadAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titulo','text',['label' => 'Titulo del archivo',
                'help' => 'Indique un nombre para identificar el archivo'])
            ->add('pdf','file')
            ->add('textoAlt','text',['label' => 'Texto alternativo',
                'help'=> 'En caso de que el archivo no esté disponible, se mostrara este texto'])
            ->add('descripcion','text',['label' => 'Descripción breve del archivo',])
            ->add('estado','choice',['choices'=>[true => 'Activo',
                false => 'Desactivado']])

        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titulo',null,['label' => 'Nombre del Pdf'])
            ->add('textoAlt',null,['label' => 'Texto alternativo'])
        ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo',null,['label' => 'Nombre'])
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])
            ->add('estado',null,['label'=> '¿Activado?'])

        ;

    }

    public function prePersist($entidad) {
        $this->manageFileUpload($entidad);
    }

    public function preUpdate($entidad) {
        $this->manageFileUpload($entidad);
    }

    private function manageFileUpload($entidad) {
        if ($entidad->getPdf()) {
            $entidad->upload();
        }
    }
} 
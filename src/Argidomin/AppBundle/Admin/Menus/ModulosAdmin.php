<?php

namespace Argidomin\AppBundle\Admin\Menus;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class ModulosAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Datos del modulo')
                ->with('Datos del modulo')
                    ->add('imagenes','sonata_type_model', ['multiple' => false,
                                                           'by_reference' => false,
                                                           'label' => 'Imagenes',
                                                           'required' => false])
                    ->add('titulo','text',['label' => 'Nombre el modulo'])
                    ->add('cuerpo','textarea',['label' => 'Cuerpo del modulo'])
                    ->add('textoBoton','text',['label' => 'texto del botón'])
                    ->add('urlDestino','url',['label' => 'Url de destino del modulo'])
                    ->add('posicion','choice', ['choices'=>['superior' => 'Zona superior',
                                                            'izquierda' => 'Izquierda',
                                                            'centro' => 'Centro',
                                                            'derecha' =>'Derecha',
                                                            'izquierdaInferior' =>'Inferior Izquierda',
                                                            'derechaInferior' => 'Inferior Derecha',]])
                    ->add('soloImagen','choice',['label' =>'Solo imagen',
                                                  'help' =>'En caso de que quiera que se mueste solo imagen con el enlace indique SI',
                                                  'choices' => [true => 'Sí',
                                                                false => 'No']])
                    ->add('estado','choice',['choices'=>[true => 'Activo',
                        false => 'Desactivado'],
                        'label' => 'Estado del producto',
                        'help' => 'Para que el modulo sea visible, tiene que estar activado'])
                ->end()
            ->end()

        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titulo',null,['label' => 'Nombre el modulo'])

        ;


    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo',null,['lable' => 'nombre del modulo'])
            ->add('posicion')
            ->add('fechaCreacion','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de creación'])
            ->add('fechaActualizado','datetime',['format' => 'd/m/y h:m', 'label' =>'Fecha de modificacion'])
            ->add('estado',null,['label'=> '¿Activado?'])
        ;


    }

}
<?php

namespace Argidomin\AppBundle\Admin\Menus;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class SeccionesAdmin extends  Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->tab('Datos de la seccion')
                ->with('Datos de la seccion')

                    ->add('titulo', 'text', ['label' => 'Nombre de la sección',
                                             'help' => 'Indique aqui el nombre que se va a ver en el menu'])
                    ->add('tituloSeccion', 'text', ['label' => 'Titulo de la seccion'])
                    ->add('cuerpo', 'textarea', ['attr' =>['class' => 'tinymce',
                                                            'tinymce'=>'{"theme":"simple"}'], ])
                    ->add('tipo','choice', ['choices' => ['producto' => 'Producto',
                                                          'articulo' => 'Articulo',
                                                          'slider'   => 'Slider',
                                                          'contacto' => 'Contacto',
                                                          'caracteristicas' => 'Caracteristicas del producto',
                                                          'legal' => 'Texto legal']])

                    ->add('imagen','sonata_type_model', ['multiple' => false,
                                                         'by_reference' => false,
                                                         'label' => 'Imagen de la seccion',
                                                         'required' => false])

                    ->add('estado','choice',['choices'=>[true => 'Activo',
                        false => 'Desactivado'],
                        'label' => 'Estado de la seccion',
                        'help' => 'Para que la seccion sea visible, tiene que estar activado'])
                ->end()
            ->end()

            ->tab('Ruta y menu')
                ->with('Ruta y menu')
                    ->add('menu','sonata_type_model', ['multiple' => false,
                        'by_reference' => false,
                        'label' => 'Menu al que pertenece',
                        'help' => 'El menu elegido determinara donde se muestra el producto'])
                    ->add('seccionPadre')
                    ->add('ruta','text',['help' => 'La ruta debe de ir e minusculas, sin caracteres especiales y sin espacios'])
                ->add('posicion','text',['label' => 'Posicion en el menú'])

                ->end()
            ->end()

            ->tab('Caracteristicas de los productos')
                ->with('Caracteristicas de los productos')
                    ->add('caracterisiticas','sonata_type_model', ['multiple' => true,
                                                                  'by_reference' => false,
                                                                  'label' => 'Modulos de la seccion',
                                                                  'required' => false])
                ->end()
            ->end()

            ->tab('Modulos de la seccion')
                ->with('Modulos de la seccion')
                    ->add('modulos','sonata_type_model', ['multiple' => true,
                                                          'by_reference' => false,
                                                          'label' => 'Modulos de la seccion',
                                                          'required' => false])
                ->end()
            ->end()

            ->tab('Datos de SEO de la seccion')
                ->with('Datos SEO de la Seccion')
                    ->add('metaTitulo','text',['label' => 'Meta titulo de la seccion',
                                               'help' => 'Maximo 70 caracteres'])
                    ->add('metaDescripcion','text',['label' => 'Meta descripción de la seccion',
                                                    'help' => 'Maximo 160 caracteres'])
                ->end()
            ->end()
            ->tab('Colores')
                ->with('Colores')
                    ->add('colorTexto','text',['help' => 'Este texto se muestra al lado del nombre de producto donde se muestran los productos',
                                               'required' => false])
                    ->add('colores', 'sonata_type_model', ['multiple' => true,
                        'by_reference' => false,
                        'label' => 'Diferentes Colores del producto',
                        'required' => false])
                ->end()
            ->end()

            ->tab('Adjuntos de la sección')
                ->with('Slider')
                    ->add('slider','sonata_type_model', ['multiple' => false,
                                                         'by_reference' => false,
                                                         'label' => 'Slider del producto',
                                                         'required' => false])
                    ->end()
                ->with('Video del producto')
                    ->add('video','sonata_type_model', ['multiple' => false,
                                                        'by_reference' => false,
                                                        'label' => 'Video del producto',
                                                        'required' => false])
                ->end()

                ->with('Instrucciones de montaje')
                    ->add('pdfMontaje','sonata_type_model', ['multiple' => false,
                                                          'by_reference' => false,
                                                          'label' => 'Instrucciones de montaje',
                                                          'required' => false])
                ->end()

                ->with('Instrucciones de seguridad')
                    ->add('pdfSeguridad','sonata_type_model', ['multiple' => false,
                                                            'by_reference' => false,
                                                            'label' => 'Instrucciones de seguridad',
                                                            'required' => false])
                ->end()
            ->end()

            ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

        $datagridMapper
            ->add('titulo', null, ['label' => 'Nombre de la sección'])
            ->add('menu')
            ->add('ruta')
            ->add('estado')
            ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo', null, ['label' => 'Nombre de la sección'])
            ->add('menu')
            ->add('ruta')
            ->add('tipo')
            ->add('caracterisiticas')
            ->add('slider.imagenes')
            ->add('modulos')
            ->add('colores')
            ->add('slider')
            ->add('estado',null,['label'=> '¿Activado?'])
            
            ;

    }


}
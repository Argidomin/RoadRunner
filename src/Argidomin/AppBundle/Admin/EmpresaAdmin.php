<?php
/**
 * Created by PhpStorm.
 * User: carlosgude
 * Date: 29/10/14
 * Time: 9:32
 */

namespace Argidomin\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class EmpresaAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Datos de la empresa')
                ->with('Datos de la empresa')
                    ->add('nombre','text',['label' => 'Nombre de la empresa'])
                    ->add('email','email',['label' => 'Email de contacto'])
                    ->add('contacto','text',['label' =>'Etiqueta contacto',
                                             'help' =>'Este texto se mostrara junto al telefono'])
                    ->add('telefonoContacto','text')
            ->add('estado', 'choice', ['choices' => [true => 'Activo',
                false => 'Desactivado']])
                ->end()
            ->end()
            ->tab('Cofiguración de la web')
                ->with('Configuración de la web')
                    ->add('titulo','text',['label' => 'Titulo de la web'])
                    ->add('slogan','text',['label' => 'Slogan de la empresa'])
                ->end()
            ->end()
            ->tab('Redes Sociales')
                ->with('Redes sociales')
                    ->add('redesSociales','text',['label' => 'Etiqueta redes sociales',
                                                  'help' => 'Este texto se mostrara antes de los iconos de las redes sociales'])
                    ->add('urlFacebook', 'url')
                    ->add('urlTwitter', 'url')
                    ->add('urlGoogle', 'url')
                ->end()

            ->end()
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre',null,['label' => 'Nombre de la empresa'])
            ->add('email',null)
            ->add('telefonoContacto')
        ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombre',null,['label' => 'Nombre de la empresa'])
            ->add('email',null)
            ->add('telefonoContacto')
            ->add('estado', null, ['label' => '¿Activada?'])

        ;

    }


} 
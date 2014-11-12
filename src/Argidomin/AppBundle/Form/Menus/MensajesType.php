<?php

namespace Argidomin\AppBundle\Form\Menus;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MensajesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailOrigen','email',['label'=>'E-mail',
                                         'required' =>true])

            ->add('asunto','text',['label' => 'Asunto',
                                    'required' => true])

            ->add('nombre','text',['label' => 'Nombre',
                                   'required' => true])

            ->add('producto','choice',['label' => 'Producto',
                                       'choices' => ['Didicar Original' => 'Didicar Original',
                                                    'Didicar walk and Ride' => 'Didicar walk and Ride',
                                                    'Didistikers' => 'Didistikers',
                                                    'otros' => 'Otros motivos']])

            ->add('empresa','text',['label' => 'Empresa',
                                    'required' => false])

            ->add('telefono','number',['label' => 'Telefono',
                                      'required' => true])

            ->add('cuerpo','textarea',['label' => 'Indique el motivo de su consulta',
                                       'required' => true])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Argidomin\AppBundle\Entity\Menus\Mensajes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'argidomin_appbundle_menus_mensajes';
    }
}

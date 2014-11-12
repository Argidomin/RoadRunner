<?php

namespace Argidomin\AppBundle\Controller;

use Argidomin\AppBundle\Entity\Menus\Mensajes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Argidomin\AppBundle\Form\Menus\MensajesType;

class SitioController extends Controller
{
    public function getSecction($seccion)
    {
        $em = $this->getDoctrine()->getManager();

        $seccion = $em->getRepository('AppBundle:Menus\Secciones')
                        ->getSeccion($seccion);

        if (null === $seccion)
        {
            throw $this->createNotFoundException('No existe la sección pedida');
        }

        return $seccion;

    }

    /**
     *@Route("/contacto", name="contacto")
     */
    public function contactoAction(Request $request)
    {

        $mensaje = new Mensajes();

        $form = $this->createForm(new MensajesType(),$mensaje );

        $seccion = $this->getSecction('contacto');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($mensaje);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => '¡Mensaje enviado!',
                    'message' => 'El mensaje ha sido enviado con exito, en breves nos pondremos en contacto con usted.'
                )
            );

            $this->get('plantilla')->sendMail($mensaje);

        }


        return $this->render(':Sitio:contacto.html.twig',['form' =>$form->createView(),
                                                          'seccion' => $seccion]);
    }
    /**
     * @Route("/{ruta}/{sub}", name="sitio",
     *         defaults={"ruta" = "portada","sub"= null})
     */
    public function seccionAction($ruta = 'portada',$sub = null)
    {

        $seccion = $this->getSecction((is_null($sub)?$ruta : $sub));

        return $this->render(':Sitio:'.$seccion->getTipo().'.html.twig',
                                ['seccion' => $seccion,
                                 'ruta' => $ruta]);
    }



}

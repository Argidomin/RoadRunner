<?php

namespace Argidomin\AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlantillaController extends Controller
{
    public $empresa;
	protected $em;
	protected $container;
    protected $submenu;

	public function __construct(EntityManager $em, $container)
	{
		$this->em = $em;
		$this->container = $container;
		$this->empresa = $this->getDatos();


	}
    public function getDatos()
    {
        return $this->em->getRepository('AppBundle:Empresa')->empresaActiva();
    }

    public function getMenu($menu ='principal')
    {
    	$menu = $this->em->getRepository('AppBundle:Menus\Secciones')
    		->getSeccionesMenu($menu);

        return $this->container->get('templating')
    			->render(':Includes:menu.html.twig',
    					['menu' => $menu]);


    }

    public function getSubmenu($elementoPadre, $html = true)
    {
        $menu = $this->em->getRepository('AppBundle:Menus\Secciones')
            ->getSubsecciones($elementoPadre);

        $elementoPadre = $this->em->getRepository('AppBundle:Menus\Secciones')
                        ->findOneBy(['slug' => $elementoPadre],['posicion' => 'ASC']);

        if  (true === $html)
        {
            return $this->container->get('templating')
                ->render(':Includes:submenu.html.twig',
                    ['menu' => $menu,
                        'padre' => $elementoPadre]);
        }

        return $menu;

    }


    public function getModulosInferiores()
    {
        $modulos = $this->em->getRepository('AppBundle:Menus\Modulos')
            ->getModulosInferiores();

        return $this->container->get('templating')
            ->render(':Sitio:modulosInferiores.html.twig',
                ['modulos' => $modulos]);
    }

    public function sendMail($mensaje)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($mensaje->getAsunto())
            ->setFrom($mensaje->getEmailOrigen())
            ->setTo([$this->empresa->getEmail(),$mensaje->getEmailOrigen()])
            ->setContentType('text/html')
            ->setBody(
                $this->container->get('templating')->render(':Email:email.html.twig',
                                                            array('mensaje' => $mensaje))
            )
        ;
        $this->get('mailer')->send($message);
    }

    public function getMenuInferiorLateral()
    {
        $menu = $this->em->getRepository('AppBundle:Menus\Secciones')
            ->getSeccionesMenu('legal');

        return $this->container->get('templating')
            ->render(':Includes:menuLateral.html.twig',
                ['menu' => $menu]);

    }

    public function getSeccionInicial($ruta)
    {
        return $this->em->getRepository('AppBundle:Menus\Secciones')
            ->getSeccion($ruta, 1);
    }

    public function siteMap(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $seccion = $em->getRepository('AppBundle:Menus\Secciones')
            ->findAll();

        $hostname = $request->getHost();

        return $this->render(':Sitemaps:sitemap.xml.twig',['seccion' => $seccion,
            'hostname' => $hostname]);



    }

}

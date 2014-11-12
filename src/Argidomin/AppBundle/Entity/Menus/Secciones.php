<?php

namespace Argidomin\AppBundle\Entity\Menus;

use Argidomin\AppBundle\Entity\Base\BaseSeoEntity as SEO;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

//Validadores de datos


/**
 * Secciones
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\Menus\Repository\SeccionesRepository")
 * @UniqueEntity("tituloSeccion")
 */
class Secciones extends SEO
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="tituloSeccion", type="string", length=100)
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     */
    private $tituloSeccion;

    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Menus\Menus", cascade={"persist"})
     */
    private $menu;

    /**
     * @var string
     * @ORM\Column(name="ruta", type="string", length=100)
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     */
    private $ruta;

    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Adjuntos\Videos", cascade={"persist"})
     */
    private $video;


    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Menus\Secciones", cascade={"persist"})
     */
    private $seccionPadre;

    /**
     * @var string
     * @ORM\Column(name="tipo", type="string", length=100)
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     */
    private $tipo;

    /**
     * @ORM\ManyToMany(targetEntity="Argidomin\AppBundle\Entity\Menus\Modulos")
     */
    private $modulos;

    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Adjuntos\Slider")
     */
    private $slider;


    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\PdfMontaje")
     */
    private $pdfMontaje;

    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\PdfSeguridad")
     */
    private $pdfSeguridad;

    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Imagenes")
     */
    private $imagen;

    /**
     * @ORM\ManyToMany(targetEntity="Argidomin\AppBundle\Entity\Menus\ColoresProductos")
     */
    private $colores;

    /**
     * @ORM\ManyToMany(targetEntity="Argidomin\AppBundle\Entity\Adjuntos\Caracteristicas")
     * @ORM\OrderBy({"orden" = "ASC"})
     */
    private $caracterisiticas;

    /**
     * @ORM\Column(name="colorTexto", type="string", length=255, nullable=true)
     */
    private $colorTexto;

    /**
     * @var string
     * @ORM\Column(name="posicion", type="integer")
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     *
     */
    private $posicion;

    public function __toString()
    {
        return $this->getTitulo();
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modulos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->colores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->caracterisiticas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tituloSeccion
     *
     * @param string $tituloSeccion
     * @return Secciones
     */
    public function setTituloSeccion($tituloSeccion)
    {
        $this->tituloSeccion = $tituloSeccion;

        return $this;
    }

    /**
     * Get tituloSeccion
     *
     * @return string 
     */
    public function getTituloSeccion()
    {
        return $this->tituloSeccion;
    }

    /**
     * Set ruta
     *
     * @param string $ruta
     * @return Secciones
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string 
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Secciones
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set menu
     *
     * @param \Argidomin\AppBundle\Entity\Menus\Menus $menu
     * @return Secciones
     */
    public function setMenu(\Argidomin\AppBundle\Entity\Menus\Menus $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Argidomin\AppBundle\Entity\Menus\Menus 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set video
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Videos $video
     * @return Secciones
     */
    public function setVideo(\Argidomin\AppBundle\Entity\Adjuntos\Videos $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Argidomin\AppBundle\Entity\Adjuntos\Videos 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set seccionPadre
     *
     * @param \Argidomin\AppBundle\Entity\Menus\Secciones $seccionPadre
     * @return Secciones
     */
    public function setSeccionPadre(\Argidomin\AppBundle\Entity\Menus\Secciones $seccionPadre = null)
    {
        $this->seccionPadre = $seccionPadre;

        return $this;
    }

    /**
     * Get seccionPadre
     *
     * @return \Argidomin\AppBundle\Entity\Menus\Secciones 
     */
    public function getSeccionPadre()
    {
        return $this->seccionPadre;
    }

    /**
     * Add modulos
     *
     * @param \Argidomin\AppBundle\Entity\Menus\Modulos $modulos
     * @return Secciones
     */
    public function addModulo(\Argidomin\AppBundle\Entity\Menus\Modulos $modulos)
    {
        $this->modulos[] = $modulos;

        return $this;
    }

    /**
     * Remove modulos
     *
     * @param \Argidomin\AppBundle\Entity\Menus\Modulos $modulos
     */
    public function removeModulo(\Argidomin\AppBundle\Entity\Menus\Modulos $modulos)
    {
        $this->modulos->removeElement($modulos);
    }

    /**
     * Get modulos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulos()
    {
        return $this->modulos;
    }

    /**
     * Set slider
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Slider $slider
     * @return Secciones
     */
    public function setSlider(\Argidomin\AppBundle\Entity\Adjuntos\Slider $slider = null)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return \Argidomin\AppBundle\Entity\Adjuntos\Slider 
     */
    public function getSlider()
    {
        return $this->slider;
    }

    /**
     * Set pdfMontaje
     *
     * @param \Argidomin\AppBundle\Entity\PdfMontaje $pdfMontaje
     * @return Secciones
     */
    public function setPdfMontaje(\Argidomin\AppBundle\Entity\PdfMontaje $pdfMontaje = null)
    {
        $this->pdfMontaje = $pdfMontaje;

        return $this;
    }

    /**
     * Get pdfMontaje
     *
     * @return \Argidomin\AppBundle\Entity\PdfMontaje 
     */
    public function getPdfMontaje()
    {
        return $this->pdfMontaje;
    }

    /**
     * Set pdfSeguridad
     *
     * @param \Argidomin\AppBundle\Entity\PdfSeguridad $pdfSeguridad
     * @return Secciones
     */
    public function setPdfSeguridad(\Argidomin\AppBundle\Entity\PdfSeguridad $pdfSeguridad = null)
    {
        $this->pdfSeguridad = $pdfSeguridad;

        return $this;
    }

    /**
     * Get pdfSeguridad
     *
     * @return \Argidomin\AppBundle\Entity\PdfSeguridad 
     */
    public function getPdfSeguridad()
    {
        return $this->pdfSeguridad;
    }

    /**
     * Set imagen
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagen
     * @return Secciones
     */
    public function setImagen(\Argidomin\AppBundle\Entity\Imagenes $imagen = null)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return \Argidomin\AppBundle\Entity\Imagenes 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Add colores
     *
     * @param \Argidomin\AppBundle\Entity\Menus\ColoresProductos $colores
     * @return Secciones
     */
    public function addColore(\Argidomin\AppBundle\Entity\Menus\ColoresProductos $colores)
    {
        $this->colores[] = $colores;

        return $this;
    }

    /**
     * Remove colores
     *
     * @param \Argidomin\AppBundle\Entity\Menus\ColoresProductos $colores
     */
    public function removeColore(\Argidomin\AppBundle\Entity\Menus\ColoresProductos $colores)
    {
        $this->colores->removeElement($colores);
    }

    /**
     * Get colores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColores()
    {
        return $this->colores;
    }

    /**
     * Add caracterisiticas
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Caracteristicas $caracterisiticas
     * @return Secciones
     */
    public function addCaracterisitica(\Argidomin\AppBundle\Entity\Adjuntos\Caracteristicas $caracterisiticas)
    {
        $this->caracterisiticas[] = $caracterisiticas;

        return $this;
    }

    /**
     * Remove caracterisiticas
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Caracteristicas $caracterisiticas
     */
    public function removeCaracterisitica(\Argidomin\AppBundle\Entity\Adjuntos\Caracteristicas $caracterisiticas)
    {
        $this->caracterisiticas->removeElement($caracterisiticas);
    }

    /**
     * Get caracterisiticas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCaracterisiticas()
    {
        return $this->caracterisiticas;
    }

    /**
     * Set posicion
     *
     * @param integer $posicion
     * @return Secciones
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return integer 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set colorTexto
     *
     * @param string $colorTexto
     * @return Secciones
     */
    public function setColorTexto($colorTexto)
    {
        $this->colorTexto = $colorTexto;

        return $this;
    }

    /**
     * Get colorTexto
     *
     * @return string 
     */
    public function getColorTexto()
    {
        return $this->colorTexto;
    }
}

<?php

namespace Argidomin\AppBundle\Entity\Adjuntos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Slider
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Slider
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
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     * @Gedmo\Slug(fields={"nombre"})
     * @ORM\Column(name="slug", type="string", length=100)
     */
    private $slug;


    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="fechaCreacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="fechaActualizado", type="datetime")
     */
    private $fechaActualizado;

    /**
     * @ORM\ManyToMany(targetEntity="Argidomin\AppBundle\Entity\Imagenes")
     * @ORM\JoinTable(name="slider_imagenes",
     *      joinColumns={@ORM\JoinColumn(name="slider_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="imagen_ide", referencedColumnName="id")}
     *      )
     * @ORM\OrderBy({"ordenSlider" = "ASC"})
     */
    private $imagenes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNombre();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Slider
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Slider
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Slider
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaActualizado
     *
     * @param \DateTime $fechaActualizado
     * @return Slider
     */
    public function setFechaActualizado($fechaActualizado)
    {
        $this->fechaActualizado = $fechaActualizado;

        return $this;
    }

    /**
     * Get fechaActualizado
     *
     * @return \DateTime 
     */
    public function getFechaActualizado()
    {
        return $this->fechaActualizado;
    }

    /**
     * Add imagenes
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagenes
     * @return Slider
     */
    public function addImagene(\Argidomin\AppBundle\Entity\Imagenes $imagenes)
    {
        $this->imagenes[] = $imagenes;

        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagenes
     */
    public function removeImagene(\Argidomin\AppBundle\Entity\Imagenes $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Slider
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Slider
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}

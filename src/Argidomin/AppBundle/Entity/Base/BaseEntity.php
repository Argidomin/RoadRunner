<?php

namespace Argidomin\AppBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

//Validadores de datos
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/** @ORM\MappedSuperclass 
  * @UniqueEntity("titulo")
  */
class BaseEntity
{
    /**
     * @var string
     * @ORM\Column(name="titulo", type="string", length=100)
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     */
    private $titulo;

    /**
     * @var string
     * @Gedmo\Slug(fields={"titulo"})
     * @ORM\Column(name="slug", type="string", length=75)
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(name="cuerpo", type="text")
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     * 
     */
    private $cuerpo;

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
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;



    public function __construct()
    {
        $this->estado = false;
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
     * Set titulo
     *
     * @param string $titulo
     * @return Base
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Base
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

    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Base
     */
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }

    /**
     * Get cuerpo
     *
     * @return string 
     */
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Base
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
     * @return Base
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
     * Set estado
     *
     * @param boolean $estado
     * @return Base
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

        public function __toString()
    {
        return $this->getTitulo();
    }
}

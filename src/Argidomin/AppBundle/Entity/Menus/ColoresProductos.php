<?php

namespace Argidomin\AppBundle\Entity\Menus;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ColoresProductos
 *
 * @ORM\Table()
 * @ORM\Entity()
 * @UniqueEntity("color")
 */
class ColoresProductos
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
     * @ORM\Column(name="ColorHEX", type="string", length=255)
     */
    private $colorHEX;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;


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
     *@ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Imagenes", cascade={"persist"})
     */
    private $imagenes;

    /**
     *@ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Imagenes", cascade={"persist"})
     */
    private $imagenesMiniatura;







    public function __toString()
    {
        return $this->getColorHEX() .' '. $this->getColor();
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
     * Set colorHEX
     *
     * @param string $colorHEX
     * @return ColoresProductos
     */
    public function setColorHEX($colorHEX)
    {
        $this->colorHEX = $colorHEX;

        return $this;
    }

    /**
     * Get colorHEX
     *
     * @return string 
     */
    public function getColorHEX()
    {
        return $this->colorHEX;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return ColoresProductos
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }


    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return ColoresProductos
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
     * @return ColoresProductos
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
     * Set imagenes
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagenes
     * @return ColoresProductos
     */
    public function setImagenes(\Argidomin\AppBundle\Entity\Imagenes $imagenes = null)
    {
        $this->imagenes = $imagenes;

        return $this;
    }

    /**
     * Get imagenes
     *
     * @return \Argidomin\AppBundle\Entity\Imagenes 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }


    /**
     * Set seccion
     *
     * @param \Argidomin\AppBundle\Entity\Menus\Secciones $seccion
     * @return ColoresProductos
     */
    public function setSeccion(\Argidomin\AppBundle\Entity\Menus\Secciones $seccion = null)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get seccion
     *
     * @return \Argidomin\AppBundle\Entity\Menus\Secciones 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Set textoColor
     *
     * @param string $textoColor
     * @return ColoresProductos
     */
    public function setTextoColor($textoColor)
    {
        $this->textoColor = $textoColor;

        return $this;
    }

    /**
     * Get textoColor
     *
     * @return string 
     */
    public function getTextoColor()
    {
        return $this->textoColor;
    }

    /**
     * Set imagenesMiniatura
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagenesMiniatura
     * @return ColoresProductos
     */
    public function setImagenesMiniatura(\Argidomin\AppBundle\Entity\Imagenes $imagenesMiniatura = null)
    {
        $this->imagenesMiniatura = $imagenesMiniatura;

        return $this;
    }

    /**
     * Get imagenesMiniatura
     *
     * @return \Argidomin\AppBundle\Entity\Imagenes 
     */
    public function getImagenesMiniatura()
    {
        return $this->imagenesMiniatura;
    }

}

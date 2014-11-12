<?php

namespace Argidomin\AppBundle\Entity\Menus;

use Argidomin\AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Modulos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\Menus\Repository\ModulosRepository")
 */
class Modulos extends BaseEntity
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
     * @ORM\Column(name="posicion", type="string", length=255)
     */
    private $posicion;

    /**
     * @var string
     *
     * @ORM\Column(name="urlDestino", type="string", length=255)
     */
    private $urlDestino;

    /**
     * @ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Imagenes")
     */
    private $imagenes;

    /**
     * @var string
     *
     * @ORM\Column(name="textoboton", type="string", length=255)
     */
    private $textoBoton;

    /**
     * @var boolean
     *
     * @ORM\Column(name="soloImagen", type="boolean")
     */
    private $soloImagen;



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
     * Set posicion
     *
     * @param string $posicion
     * @return Modulos
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return string 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set urlDestino
     *
     * @param string $urlDestino
     * @return Modulos
     */
    public function setUrlDestino($urlDestino)
    {
        $this->urlDestino = $urlDestino;

        return $this;
    }

    /**
     * Get urlDestino
     *
     * @return string 
     */
    public function getUrlDestino()
    {
        return $this->urlDestino;
    }

    /**
     * Set textoBoton
     *
     * @param string $textoBoton
     * @return Modulos
     */
    public function setTextoBoton($textoBoton)
    {
        $this->textoBoton = $textoBoton;

        return $this;
    }

    /**
     * Get textoBoton
     *
     * @return string 
     */
    public function getTextoBoton()
    {
        return $this->textoBoton;
    }



    /**
     * Set imagenes
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagenes
     * @return Modulos
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
     * Set soloImagen
     *
     * @param boolean $soloImagen
     * @return Modulos
     */
    public function setSoloImagen($soloImagen)
    {
        $this->soloImagen = $soloImagen;

        return $this;
    }

    /**
     * Get soloImagen
     *
     * @return boolean 
     */
    public function getSoloImagen()
    {
        return $this->soloImagen;
    }
}

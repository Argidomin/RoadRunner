<?php

namespace Argidomin\AppBundle\Entity\Adjuntos;

use Argidomin\AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Catacteriticas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Caracteristicas extends BaseEntity
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
     *@ORM\ManyToOne(targetEntity="Argidomin\AppBundle\Entity\Imagenes", cascade={"persist"})
     */
    private $imagenes;


    /**
     *@ORM\Column(name="ruta", type="string", length=255)
     */
    private  $ruta = 'caracteristicas';


    /**
     * @ORM\Column(name="orden", type="integer")
     */
    private $orden;



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
     * Set ruta
     *
     * @param string $ruta
     * @return Caracteristicas
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
     * Set imagenes
     *
     * @param \Argidomin\AppBundle\Entity\Imagenes $imagenes
     * @return Caracteristicas
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
     * Set orden
     *
     * @param integer $orden
     * @return Caracteristicas
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }
}

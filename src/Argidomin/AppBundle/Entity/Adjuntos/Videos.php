<?php

namespace Argidomin\AppBundle\Entity\Adjuntos;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\Adjuntos\VideosRepository")
 */
class Videos
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="textoAlt", type="string", length=255)
     */
    private $textoAlt;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

    /**
     *
     */
    public function __toString()
    {
        return $this->getTitulo();
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
     * @return Videos
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Videos
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
     * Set textoAlt
     *
     * @param string $textoAlt
     * @return Videos
     */
    public function setTextoAlt($textoAlt)
    {
        $this->textoAlt = $textoAlt;

        return $this;
    }

    /**
     * Get textoAlt
     *
     * @return string 
     */
    public function getTextoAlt()
    {
        return $this->textoAlt;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Videos
     */
    public function setUrl($url)
    {
        $url = explode('=',$url);
        $this->url = $url[1];

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Videos
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
}

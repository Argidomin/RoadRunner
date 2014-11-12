<?php

namespace Argidomin\AppBundle\Entity\Menus;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Mensajes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\Menus\Repository\MensajesRepository")
 */
class Mensajes
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
     * @ORM\Column(name="emailOrigen", type="string", length=255)
     */
    private $emailOrigen;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=255)
     */
    private $asunto;


    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=255, nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="producto", type="string", length=255)
     */
    private $producto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

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
     * @var string
     * @ORM\Column(name="cuerpo", type="text")
     * @Assert\NotBlank(message="No puede dejar esta casilla en blanco")
     *
     */
    private $cuerpo;

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
     * Get emailOrigen
     *
     * @return string
     */
    public function getEmailOrigen()
    {
        return $this->emailOrigen;
    }

    /**
     * Set emailOrigen
     *
     * @param string $emailOrigen
     * @return Mensajes
     */
    public function setEmailOrigen($emailOrigen)
    {
        $this->emailOrigen = $emailOrigen;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     * @return Mensajes
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Mensajes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Mensajes
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set producto
     *
     * @param string $producto
     * @return Mensajes
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Mensajes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Mensajes
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

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
     * Set fechaActualizado
     *
     * @param \DateTime $fechaActualizado
     * @return Mensajes
     */
    public function setFechaActualizado($fechaActualizado)
    {
        $this->fechaActualizado = $fechaActualizado;

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
     * Set estado
     *
     * @param boolean $estado
     * @return Mensajes
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Mensajes
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
}

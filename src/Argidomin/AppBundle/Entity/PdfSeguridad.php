<?php
/**
 * Created by PhpStorm.
 * User: carlosgude
 * Date: 30/10/14
 * Time: 12:20
 */

namespace Argidomin\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;


use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * imagenes
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class PdfSeguridad
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
     * @return string
     * @Assert\File(maxSize="6000000")
     *
     */
    private $pdf;

    /**
     * @ORM\Column(name="ruta", type="string")
     */
    private $ruta;

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


    public function setPdf(UploadedFile $pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function getPdf()
    {
        return $this->pdf;
    }


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
     * @return PdfMontaje
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
     * @return PdfMontaje
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
     * @return PdfMontaje
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
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set ruta
     *
     * @param string $ruta
     * @return Empresa
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }


    public function getAbsolutePath()
    {
        return null === $this->ruta
            ? null
            : $this->getUploadRootDir().'/'.$this->ruta;
    }

    public function getWebPath()
    {
        return null === $this->ruta
            ? null
            : $this->getUploadDir().'/'.$this->ruta;
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/imagen cargada en la vista.
        return 'uploads/pdf';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getPdf()) {
            return;
        }

        // aquí usa el nombre de archivo original pero lo debes
        // sanear al menos para evitar cualquier problema de seguridad

        // move takes the target directory and then the
        // target filename to move to
        $nombreArchivo = $this->getTitulo().'.' .$this->getPdf()->getClientOriginalExtension();
        $this->getPdf()->move(
            $this->getUploadRootDir(),
            $nombreArchivo
        );

        // set the path property to the filename where you've saved the file
        $this->ruta = $nombreArchivo;

        // limpia la propiedad «file» ya que no la necesitas más
        $this->pdf = null;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return PdfMontaje
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
     * @return PdfMontaje
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
     * @return PdfSeguridad
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

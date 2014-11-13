<?php

namespace Argidomin\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * imagenes
 *
 * @ORM\Table()
 * @ORM\Entity
 *   * @UniqueEntity("nombre")
 */
class Imagenes
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
     *
     * @ORM\Column(name="nombreID", type="string", length=255)
     */
    private $nombreID;

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
     * @return string
     * @Assert\File(maxSize="6000000")
     *
     */
    private $imagen;

    /**
     * @ORM\Column(name="ruta", type="string")
     */
    private $ruta;

    /**
     * @ORM\Column(name="ordenSlider", type="integer")
     **/
    private $ordenSlider;

    /**
     * @ORM\Column(name="url", type="string")
     */
    private $url;



    public function __toString()
    {
        return $this->getNombreID();
    }

    public function setImagen(UploadedFile $imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
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
        return 'uploads/imagenes';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImagen()) {
            return;
        }

        // aquí usa el nombre de archivo original pero lo debes
        // sanear al menos para evitar cualquier problema de seguridad

        // move takes the target directory and then the
        // target filename to move to
        $nombreArchivo = $this->getNombre().'.' .$this->getImagen()->getClientOriginalExtension();
        $this->getImagen()->move(
            $this->getUploadRootDir(),
            $nombreArchivo
        );

        // set the path property to the filename where you've saved the file
        $this->ruta = $nombreArchivo;

        // limpia la propiedad «file» ya que no la necesitas más
        $this->imagen = null;
    }


    /**
     * Set slider
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Slider $slider
     * @return imagenes
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
     * @return Imagenes
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
     * Set nombreID
     *
     * @param string $nombreID
     * @return Imagenes
     */
    public function setNombreID($nombreID)
    {
        $this->nombreID = $nombreID;

        return $this;
    }

    /**
     * Get nombreID
     *
     * @return string 
     */
    public function getNombreID()
    {
        return $this->nombreID;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Imagenes
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
     * @return Imagenes
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
     * @return Imagenes
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
     * Set ruta
     *
     * @param string $ruta
     * @return Imagenes
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
     * Constructor
     */
    public function __construct()
    {
        $this->slider = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add slider
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Slider $slider
     * @return Imagenes
     */
    public function addSlider(\Argidomin\AppBundle\Entity\Adjuntos\Slider $slider)
    {
        $this->slider[] = $slider;

        return $this;
    }

    /**
     * Remove slider
     *
     * @param \Argidomin\AppBundle\Entity\Adjuntos\Slider $slider
     */
    public function removeSlider(\Argidomin\AppBundle\Entity\Adjuntos\Slider $slider)
    {
        $this->slider->removeElement($slider);
    }

    /**
     * Set ordenSlider
     *
     * @param integer $ordenSlider
     * @return Imagenes
     */
    public function setOrdenSlider($ordenSlider)
    {
        $this->ordenSlider = $ordenSlider;

        return $this;
    }

    /**
     * Get ordenSlider
     *
     * @return integer 
     */
    public function getOrdenSlider()
    {
        return $this->ordenSlider;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Imagenes
     */
    public function setUrl($url)
    {
        $this->url = $url;

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
}

<?php

namespace Argidomin\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Empresa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\EmpresaRepository")
 */
class Empresa
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
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     *  @ORM\Column(name="titulo", type="string")
     */
    private $titulo;

    /**
     * @ORM\Column(name="telefonoContacto", type="string")
     */
    private $telefonoContacto;

    /**
     *  @ORM\Column(name="urlFacebook", type="string")
     */
    private $urlFacebook;

    /**
     *  @ORM\Column(name="urlTwitter", type="string")
     */
    private $urlTwitter;

    /**
     *  @ORM\Column(name="urlGoogle", type="string")
     */
    private $urlGoogle;

    /**
     *  @ORM\Column(name="slogan", type="string")
     */
    private $slogan;

    /**
     *  @ORM\Column(name="contacto", type="string")
     */
    private $contacto;

    /**
     *  @ORM\Column(name="redesSociales", type="string")
     */
    private $redesSociales;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

    /**
     * @return string
     * @Assert\File(maxSize="6000000")
     *
     */
    private $logo;

    /**
     * @ORM\Column(name="ruta", type="string", nullable=true)
     */
    private $ruta;


    public function setLogo(UploadedFile $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }


    public function __toString()
    {
        return $this->getNombre();
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
     * @return Empresa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
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
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Empresa
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Set titulo
     *
     * @param string $titulo
     * @return Empresa
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return \number
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set telefonoContacto
     *
     * @param \number $telefonoContacto
     * @return Empresa
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    /**
     * Get urlTwitter
     *
     * @return string
     */
    public function getUrlTwitter()
    {
        return $this->urlTwitter;
    }

    /**
     * Set urlTwitter
     *
     * @param string $urlTwitter
     * @return Empresa
     */
    public function setUrlTwitter($urlTwitter)
    {
        $this->urlTwitter = $urlTwitter;

        return $this;
    }

    /**
     * Get urlGoogle
     *
     * @return string
     */
    public function getUrlGoogle()
    {
        return $this->urlGoogle;
    }

    /**
     * Set urlGoogle
     *
     * @param string $urlGoogle
     * @return Empresa
     */
    public function setUrlGoogle($urlGoogle)
    {
        $this->urlGoogle = $urlGoogle;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set slogan
     *
     * @param string $slogan
     * @return Empresa
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get urlFacebook
     *
     * @return string
     */
    public function getUrlFacebook()
    {
        return $this->urlFacebook;
    }

    /**
     * Set urlFacebook
     *
     * @param string $urlFacebook
     * @return Empresa
     */
    public function setUrlFacebook($urlFacebook)
    {
        $this->urlFacebook = $urlFacebook;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return Empresa
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get redesSociales
     *
     * @return string
     */
    public function getRedesSociales()
    {
        return $this->redesSociales;
    }

    /**
     * Set redesSociales
     *
     * @param string $redesSociales
     * @return Empresa
     */
    public function setRedesSociales($redesSociales)
    {
        $this->redesSociales = $redesSociales;

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
     * @return Empresa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
        return 'uploads/logoEmpresa';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getLogo()) {
            return;
        }

        // aquí usa el nombre de archivo original pero lo debes
        // sanear al menos para evitar cualquier problema de seguridad

        // move takes the target directory and then the
        // target filename to move to
        $nombreArchivo = $this->getNombre().'.' .$this->getLogo()->getOriginalExtension();
        $this->getLogo()->move(
            $this->getUploadRootDir(),
            $nombreArchivo
        );

        // set the path property to the filename where you've saved the file
        $this->ruta = $nombreArchivo;

        // limpia la propiedad «file» ya que no la necesitas más
        $this->logo = null;
    }
}

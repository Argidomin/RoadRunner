<?php

namespace Argidomin\AppBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;


use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * BaseSeoEntity
 *
 * @ORM\MappedSuperclass 
*/

class BaseSeoEntity extends BaseEntity
{
    /**
     * @var string
     * @ORM\Column(name="metaTitulo", type="string", length=70)
     */
    private $metaTitulo;

    /**
     * @var string
     * @ORM\Column(name="metaDescripcion", type="string", length=160)
     */
    private $metaDescripcion;

    /**
     * Set metaTitulo
     *
     * @param string $metaTitulo
     * @return BaseSeoEntity
     */
    public function setMetaTitulo($metaTitulo)
    {
        $this->metaTitulo = $metaTitulo;

        return $this;
    }

    /**
     * Get metaTitulo
     *
     * @return string 
     */
    public function getMetaTitulo()
    {
        return $this->metaTitulo;
    }

    /**
     * Set metaDescripcion
     *
     * @param string $metaDescripcion
     * @return BaseSeoEntity
     */
    public function setMetaDescripcion($metaDescripcion)
    {
        $this->metaDescripcion = $metaDescripcion;

        return $this;
    }

    /**
     * Get metaDescripcion
     *
     * @return string 
     */
    public function getMetaDescripcion()
    {
        return $this->metaDescripcion;
    }

    /**
     * Set metaDesccripcion
     *
     * @param string $metaDesccripcion
     * @return BaseSeoEntity
     */
    public function setMetaDesccripcion($metaDesccripcion)
    {
        $this->metaDesccripcion = $metaDesccripcion;

        return $this;
    }

    /**
     * Get metaDesccripcion
     *
     * @return string 
     */
    public function getMetaDesccripcion()
    {
        return $this->metaDesccripcion;
    }
}

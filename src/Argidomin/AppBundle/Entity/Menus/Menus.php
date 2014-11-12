<?php

namespace Argidomin\AppBundle\Entity\Menus;

use Argidomin\AppBundle\Entity\Base\BaseEntity as Base;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\Menus\Repository\MenusRepository")
 */
class Menus extends Base
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
     * Constructor
     */
    public function __construct()
    {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
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

}

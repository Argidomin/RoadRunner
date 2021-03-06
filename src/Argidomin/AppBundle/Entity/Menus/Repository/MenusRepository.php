<?php

namespace Argidomin\AppBundle\Entity\Menus\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ArticulosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MenusRepository extends EntityRepository
{
    public function getMenuActivo($menu)
    {
        $em = $this->getEntityManager();

        $query = $em->createQueryBuilder();

        return $query->select(['p','m'])
            ->from('AppBundle:Menus\Menus', 'm')
            ->innerJoin('m.productos' , 'p')
            ->where($query->expr()->eq('m.slug',':menu'))
            ->andWhere($query->expr()->eq('p.estado',':estado'))
            ->andWhere($query->expr()->eq('m.estado',':estado'))

            ->setParameters([':menu'=> $menu,
                             ':estado' => true])

            ->getQuery()->getArrayResult();

    }
}

<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Tapa;

/**
 * TapaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TapaRepository extends \Doctrine\ORM\EntityRepository
{
    //funcion que devuelve las tapas para una pagina con un numero de elementos
    public function paginaTapas($numTapas=3, $pagina=1)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT t FROM '. Tapa::class . ' t where t.top = :dest'   
        )->setParameter('dest', 1)
        ->setFirstResult($numTapas*($pagina-1))
        ->setMaxResults($numTapas);
        $tapas =  $query->getResult();
        return $tapas;
    }
}

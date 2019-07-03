<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 02/12/2018
 * Time: 20:31
 */

namespace SoftUniBlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
class ProductRepository extends EntityRepository
{
    public function findByNameAndPrice()
    {
        $query=$this->getEntityManager()
            ->createQuery('SELECT p FROM SoftUniBlogBundle:Product p WHERE p.id=:id')
            ->setParameter('id',1);
        return $query->getResult();
    }
}
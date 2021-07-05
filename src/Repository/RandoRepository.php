<?php

namespace App\Repository;

use App\Entity\Rando;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rando|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rando|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rando[]    findAll()
 * @method Rando[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RandoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rando::class);
    }

    // /**
    //  * @return Rando[] Returns an array of Rando objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rando
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

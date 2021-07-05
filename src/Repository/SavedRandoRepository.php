<?php

namespace App\Repository;

use App\Entity\SavedRando;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavedRando|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavedRando|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavedRando[]    findAll()
 * @method SavedRando[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavedRandoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavedRando::class);
    }

    /**
    * @return SavedRando[] Returns an array of SavedRando objects
    */
    public function findByValues($user, $rando)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.user_id = :user')
            ->setParameter('user', $user)
            ->andWhere('s.rando_id = :rando')
            ->setParameter('rando', $rando)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?SavedRando
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

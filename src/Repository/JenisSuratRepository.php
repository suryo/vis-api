<?php

namespace App\Repository;

use App\Entity\JenisSurat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JenisSurat|null find($id, $lockMode = null, $lockVersion = null)
 * @method JenisSurat|null findOneBy(array $criteria, array $orderBy = null)
 * @method JenisSurat[]    findAll()
 * @method JenisSurat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JenisSuratRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JenisSurat::class);
    }

    // /**
    //  * @return JenisSurat[] Returns an array of JenisSurat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JenisSurat
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

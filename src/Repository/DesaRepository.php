<?php

namespace App\Repository;

use App\Entity\Desa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Desa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Desa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Desa[]    findAll()
 * @method Desa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DesaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Desa::class);
    }

    // /**
    //  * @return Desa[] Returns an array of Desa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Desa
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Comptemor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Comptemor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comptemor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comptemor[]    findAll()
 * @method Comptemor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComptemorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comptemor::class);
    }

    // /**
    //  * @return Comptemor[] Returns an array of Comptemor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Comptemor
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

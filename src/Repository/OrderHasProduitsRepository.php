<?php

namespace App\Repository;

use App\Entity\OrderHasProduits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderHasProduits|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderHasProduits|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderHasProduits[]    findAll()
 * @method OrderHasProduits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderHasProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderHasProduits::class);
    }

    // /**
    //  * @return OrderHasProduits[] Returns an array of OrderHasProduits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderHasProduits
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

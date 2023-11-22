<?php

namespace App\Repository;

use App\Entity\Docket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Docket>
 *
 * @method Docket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Docket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Docket[]    findAll()
 * @method Docket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Docket::class);
    }

//    /**
//     * @return Docket[] Returns an array of Docket objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Docket
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

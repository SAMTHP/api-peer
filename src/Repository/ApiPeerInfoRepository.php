<?php

namespace App\Repository;

use App\Entity\ApiPeerInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApiPeerInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiPeerInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiPeerInfo[]    findAll()
 * @method ApiPeerInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiPeerInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiPeerInfo::class);
    }

    // /**
    //  * @return ApiPeerInfo[] Returns an array of ApiPeerInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ApiPeerInfo
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

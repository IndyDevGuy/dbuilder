<?php

namespace App\Repository;

use App\Entity\InformationRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InformationRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationRequest[]    findAll()
 * @method InformationRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationRequestRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InformationRequest::class);
    }

//    /**
//     * @return InformationRequest[] Returns an array of InformationRequest objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationRequest
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

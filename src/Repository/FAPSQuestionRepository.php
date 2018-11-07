<?php

namespace App\Repository;

use App\Entity\FAPSQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FAPSQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method FAPSQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method FAPSQuestion[]    findAll()
 * @method FAPSQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FAPSQuestionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FAPSQuestion::class);
    }

//    /**
//     * @return FAPSQuestion[] Returns an array of FAPSQuestion objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FAPSQuestion
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

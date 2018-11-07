<?php

namespace App\Repository;

use App\Entity\ApplicationQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ApplicationQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationQuestion[]    findAll()
 * @method ApplicationQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationQuestionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ApplicationQuestion::class);
    }

//    /**
//     * @return ApplicationQuestion[] Returns an array of ApplicationQuestion objects
//     */
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
    public function findOneBySomeField($value): ?ApplicationQuestion
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

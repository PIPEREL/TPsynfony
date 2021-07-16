<?php

namespace App\Repository;

use App\Entity\Textcontainer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Textcontainer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Textcontainer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Textcontainer[]    findAll()
 * @method Textcontainer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextcontainerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Textcontainer::class);
    }

    // /**
    //  * @return Textcontainer[] Returns an array of Textcontainer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Textcontainer
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

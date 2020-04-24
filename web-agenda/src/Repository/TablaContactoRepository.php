<?php

namespace App\Repository;

use App\Entity\TablaContacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TablaContacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method TablaContacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method TablaContacto[]    findAll()
 * @method TablaContacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TablaContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TablaContacto::class);
    }

    // /**
    //  * @return TablaContacto[] Returns an array of TablaContacto objects
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
    public function findOneBySomeField($value): ?TablaContacto
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

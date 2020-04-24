<?php

namespace App\Repository;

use App\Entity\Datocontacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Datocontacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Datocontacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Datocontacto[]    findAll()
 * @method Datocontacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatocontactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Datocontacto::class);
    }

    // /**
    //  * @return Datocontacto[] Returns an array of Datocontacto objects
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
    public function findOneBySomeField($value): ?Datocontacto
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

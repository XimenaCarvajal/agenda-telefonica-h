<?php

namespace App\Repository;

use App\Entity\Tipocontacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tipocontacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tipocontacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tipocontacto[]    findAll()
 * @method Tipocontacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipocontactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tipocontacto::class);
    }

    // /**
    //  * @return Tipocontacto[] Returns an array of Tipocontacto objects
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
    public function findOneBySomeField($value): ?Tipocontacto
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

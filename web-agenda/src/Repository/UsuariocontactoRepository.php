<?php

namespace App\Repository;

use App\Entity\Usuariocontacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuariocontacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuariocontacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuariocontacto[]    findAll()
 * @method Usuariocontacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariocontactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuariocontacto::class);
    }

    // /**
    //  * @return Usuariocontacto[] Returns an array of Usuariocontacto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usuariocontacto
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\GamesHasUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GamesHasUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamesHasUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamesHasUsers[]    findAll()
 * @method GamesHasUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamesHasUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamesHasUsers::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(GamesHasUsers $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(GamesHasUsers $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return GamesHasUsers[] Returns an array of GamesHasUsers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GamesHasUsers
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

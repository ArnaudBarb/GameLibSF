<?php

namespace App\Repository;

use App\Entity\UsersHasGamesHasPlatforms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsersHasGamesHasPlatforms|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersHasGamesHasPlatforms|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersHasGamesHasPlatforms[]    findAll()
 * @method UsersHasGamesHasPlatforms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersHasGamesHasPlatformsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersHasGamesHasPlatforms::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsersHasGamesHasPlatforms $entity, bool $flush = true): void
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
    public function remove(UsersHasGamesHasPlatforms $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsersHasGamesHasPlatforms[] Returns an array of UsersHasGamesHasPlatforms objects
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
    public function findOneBySomeField($value): ?UsersHasGamesHasPlatforms
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

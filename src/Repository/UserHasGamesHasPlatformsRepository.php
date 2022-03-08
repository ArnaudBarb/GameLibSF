<?php

namespace App\Repository;

use App\Entity\UserHasGamesHasPlatforms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserHasGamesHasPlatforms|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserHasGamesHasPlatforms|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserHasGamesHasPlatforms[]    findAll()
 * @method UserHasGamesHasPlatforms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserHasGamesHasPlatformsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserHasGamesHasPlatforms::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UserHasGamesHasPlatforms $entity, bool $flush = true): void
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
    public function remove(UserHasGamesHasPlatforms $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UserHasGamesHasPlatforms[] Returns an array of UserHasGamesHasPlatforms objects
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
    public function findOneBySomeField($value): ?UserHasGamesHasPlatforms
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

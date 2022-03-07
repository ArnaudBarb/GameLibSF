<?php

namespace App\Repository;

use App\Entity\EditorsHasStudios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EditorsHasStudios|null find($id, $lockMode = null, $lockVersion = null)
 * @method EditorsHasStudios|null findOneBy(array $criteria, array $orderBy = null)
 * @method EditorsHasStudios[]    findAll()
 * @method EditorsHasStudios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditorsHasStudiosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EditorsHasStudios::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EditorsHasStudios $entity, bool $flush = true): void
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
    public function remove(EditorsHasStudios $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EditorsHasStudios[] Returns an array of EditorsHasStudios objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EditorsHasStudios
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

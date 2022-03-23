<?php

namespace App\Repository;

use App\Entity\SecteurHandicapName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SecteurHandicapName|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecteurHandicapName|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecteurHandicapName[]    findAll()
 * @method SecteurHandicapName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecteurHandicapNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecteurHandicapName::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SecteurHandicapName $entity, bool $flush = true): void
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
    public function remove(SecteurHandicapName $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SecteurHandicapName[] Returns an array of SecteurHandicapName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SecteurHandicapName
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

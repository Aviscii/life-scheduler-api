<?php

namespace App\Repository;

use App\Entity\DeadlineTask;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DeadlineTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeadlineTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeadlineTask[]    findAll()
 * @method DeadlineTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeadlineTaskRepository extends BaseRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, DeadlineTask::class);
    }

//    /**
//     * @return DeadlineTask[] Returns an array of DeadlineTask objects
//     */
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
    public function findOneBySomeField($value): ?DeadlineTask
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

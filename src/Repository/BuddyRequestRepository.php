<?php

namespace App\Repository;

use App\Entity\Buddy\BuddyRequest;
use App\Entity\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BuddyRequest>
 *
 * @method BuddyRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method BuddyRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method BuddyRequest[]    findAll()
 * @method BuddyRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuddyRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BuddyRequest::class);
    }

    public function save(BuddyRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BuddyRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return BuddyRequest[] Returns an array of BuddyRequest objects
     */
    public function findByUser(User $user): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?BuddyRequest
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Repository;

use App\Entity\ListeBiens;
use Doctrine\ORM\Query;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<ListeBiens>
 *
 * @method ListeBiens|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeBiens|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeBiens[]    findAll()
 * @method ListeBiens[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeBiensRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeBiens::class);
    }

    public function add(ListeBiens $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListeBiens $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return ListeBiens[] Returns an array of ListeBiens objects
    */
   public function findByExampleField($value): array
   {
       return $this->createQueryBuilder('l')
           ->andWhere('l.exampleField = :val')
           ->setParameter('val', $value)
           ->orderBy('l.id', 'ASC')
           ->setMaxResults(10)
           ->getQuery()
           ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?ListeBiens
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

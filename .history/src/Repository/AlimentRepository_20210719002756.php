<?php

namespace App\Repository;

use App\Entity\Aliment;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Aliment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aliment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aliment[]    findAll()
 * @method Aliment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlimentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aliment::class);
    }

<<<<<<< HEAD
    /**
    * @return Aliment[] Returns an array of Aliment objects
    */
    
    public function getAlimentsByProperty($propriete, $signe, $valeur)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.' .$propriete. '' .$signe. ' :val')
            ->setParameter('val', $valeur)
            ->getQuery()
            ->getResult()
        ;
    }
    
    
=======
    public function getAlimentParPropriete($propriete, $signe, $calorie){
        return $this->createQueryBuilder('a')
        ->andWhere('a.'.$propriete. ' '. $signe.' :val')
        ->setParameter('val', $calorie)
        ->getQuery()
        ->getResult()
        ;
    }

>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
    // /**
    //  * @return Aliment[] Returns an array of Aliment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aliment
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

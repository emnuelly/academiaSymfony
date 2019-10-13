<?php


namespace App\Repository;


use App\Entity\MedEvall;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class MedEvallRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedEvall::class );
    }

    public function save(MedEvall $medEvall){
        $entityManager = $this->getEntityManager();
        $entityManager->beginTransaction();
        $entityManager->persist($medEvall);
        $entityManager->commit();
        $entityManager->flush();
    }
}
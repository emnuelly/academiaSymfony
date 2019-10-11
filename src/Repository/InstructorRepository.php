<?php

namespace App\Repository;

use App\Entity\Instructor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class InstructorRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Instructor::class);
    }

    public function save(Instructor $instructor) {
        $entityManager = $this->getEntityManager();
        $entityManager->beginTransaction();
        $entityManager->persist($instructor);
        $entityManager->commit();
        $entityManager->flush();
    }
}
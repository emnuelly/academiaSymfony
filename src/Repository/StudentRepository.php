<?php


namespace App\Repository;


use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class StudentRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Student::class);
    }

    public function save(Student $student) {
        $entityManager = $this->getEntityManager();
        $entityManager->beginTransaction();
        $entityManager->persist($student);
        $entityManager->commit();
        $entityManager->flush();
    }

    public function update($student)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->beginTransaction();
        $entityManager->merge($student);
        $entityManager->commit();
        $entityManager->flush();
    }

    public function remove($student)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->beginTransaction();
        $entityManager->remove($student);
        $entityManager->commit();
        $entityManager->flush();
    }
}
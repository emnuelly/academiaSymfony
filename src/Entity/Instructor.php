<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstructorRepository")
 */
class Instructor
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     */
    private $bdate;
    /**
     * @ORM\Column(type="string")
     */
    private $cpf;
    /**
     * @ORM\Column(type="string")
     */
    private $admissionDate;
    /**
     * @ORM\Column(type="float")
     */
    private $salary;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBdate()
    {
        return $this->bdate;
    }

    /**
     * @param mixed $bdate
     */
    public function setBdate($bdate): void
    {
        $this->bdate = $bdate;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    /**
     * @param mixed $admissionDate
     */
    public function setAdmissionDate($admissionDate): void
    {
        $this->admissionDate = $admissionDate;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}
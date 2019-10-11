<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedEvalltRepository")
 */
class MedEvall
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $student_id;
    /**
     * @ORM\Column(type="float")
     */
    private $weight;
    /**
     * @ORM\Column(type="float")
     */
    private $height;
    /**
     * @ORM\Column(type="integer")
     */
    private $instructor_id;
    /**
     * @ORM\Column(type="float")
     */
    private $heartRate;
    /**
     * @ORM\Column(type="float")
     */
    private $bloodPressure;

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
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id): void
    {
        $this->student_id = $student_id;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getInstructorId()
    {
        return $this->instructor_id;
    }

    /**
     * @param mixed $instructor_id
     */
    public function setInstructorId($instructor_id): void
    {
        $this->instructor_id = $instructor_id;
    }

    /**
     * @return mixed
     */
    public function getHeartRate()
    {
        return $this->heartRate;
    }

    /**
     * @param mixed $heartRate
     */
    public function setHeartRate($heartRate): void
    {
        $this->heartRate = $heartRate;
    }

    /**
     * @return mixed
     */
    public function getBloodPressure()
    {
        return $this->bloodPressure;
    }

    /**
     * @param mixed $bloodPressure
     */
    public function setBloodPressure($bloodPressure): void
    {
        $this->bloodPressure = $bloodPressure;
    }

}
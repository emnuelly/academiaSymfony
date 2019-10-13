<?php

namespace App\Controller;

use App\Entity\Instructor;
use App\Repository\InstructorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/instructors")
 */
class InstructorController extends AbstractController
{
    /**
     * @Route("/", name="list_instructors");
     */
    public function allInstructorsAction(InstructorRepository $instructorRepository){
        $instructors = $instructorRepository->findAll();
        return $this->render('instructors/all.html.twig',[
            "instrutores" => $instructors
        ]);
    }

    /**
     * @Route("/show/{id}", name="edit_instructor", methods={"GET"})
     */
    public function editStudentAction(int $id, InstructorRepository $studentRepository) {
        $student = $studentRepository->find('id', $id);
//        return $this->render('students/student.html.twig',[
//            "aluno" => $student
//        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete_instructor", methods={"GET"})
     */
    public function deleteStudentAction(int $id, InstructorRepository $studentRepository) {
        $student = $studentRepository->find('id', $id);
        // fazer comando de delete do doctrine
    }


    /**
     * @Route("/matricula", methods={"GET"}, name="instructor_enrollment")
     */
    public function enrollmentAction(){
        return $this->render("instructors/new.html.twig");
    }

    /**
     * @Route("/matricula", methods={"POST"}, name="finish_instructor_enrollment")
     */
    public function finishEnrollmentAction(Request $req, InstructorRepository $instructorRepository)
    {
        $nome = $req->get("name");
        $cpf = $req->get("cpf");
        $bdate = $req->get("bdate");
        $admDate = $req->get("admDate");
        $salary = $req->get("salary");

        $instructor = new Instructor();
        $instructor->setName($nome);
        $instructor->setCpf($cpf);
        $instructor->setBdate($bdate);
        $instructor->setAdmissionDate($admDate);
        $instructor->setSalary($salary);

        $instructorRepository->save($instructor);

        $this->addFlash("message", "Instrutor {$nome} cadastrado com sucesso.");

        return $this->redirectToRoute("list_instructors");
    }
}
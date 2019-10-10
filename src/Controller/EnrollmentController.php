<?php


namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnrollmentController extends AbstractController
{

    /**
     * @Route("/students", name="list_students");
     */
    public function allStudentsAction(StudentRepository $studentRepository) {
        $students = $studentRepository->findAll();

        return $this->render('enrollment/all.html.twig',[
            "alunos" => $students
        ]);
    }
    /**
     * @Route("/matricula", methods={"GET"}, name="enrollment")
     */
    public function enrollmentAction() {
        return $this->render("enrollment/new.html.twig");
    }

    /**
     * @Route("/matricula", methods={"POST"}, name="finish_enrollment")
     */
    public function finishEnrollmentAction(Request $request, StudentRepository $studentRepository) {

        $nome = $request->get("nome");
        $student = new Student();
        $student->setNome($nome);
        $studentRepository->save($student);
        $this->addFlash("message", "Aluno <b>{$student->getNome()}</b> cadastrado com sucesso.");
        return $this->redirectToRoute("list_students");


    }
}
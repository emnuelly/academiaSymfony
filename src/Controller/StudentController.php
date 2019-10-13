<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; // quando esse import foi add?
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/students")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/", name="list_students");
     */
    public function allStudentsAction(StudentRepository $studentRepository) {
        $students = $studentRepository->findAll();
        return $this->render('students/all.html.twig',[
            "alunos" => $students
        ]);
    }

    /**
     * @Route("/show/{id}", name="edit_student", methods={"GET"})
     */
    public function editStudentAction(int $id, StudentRepository $studentRepository) {
        $student = $studentRepository->find('id', $id);
        return $this->render('students/student.html.twig',[
            "aluno" => $student
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete_student", methods={"GET"})
     */
    public function deleteStudentAction(int $id, StudentRepository $studentRepository) {
        $student = $studentRepository->find('id', $id);
      // fazer comando de delete do doctrine
    }

    /**
     * @Route("/matricula", methods={"GET"}, name="student_enrollment")
     */
    public function enrollmentAction() {
        return $this->render("students/new.html.twig");
    }

    /**
     * @Route("/matricula", methods={"POST"}, name="finish_student_enrollment")
     */
    public function finishEnrollmentAction(Request $request, StudentRepository $studentRepository) {

        $nome = $request->get("nome");
        $address = $request->get("address");
        $cpf = $request->get("cpf");
        $bdate = $request->get("bdate");
        $plano = $request->get("plano");
        $payment = $request->get("payment");
        $email = $request->get("email");
        $phone = $request->get("phone");

        $student = new Student();
        $student->setNome($nome);
        $student->setAddress($address);
        $student->setCpf($cpf);
        $student->setBdate($bdate);
        $student->setPlano($plano);
        $student->setPayment($payment);
        $student->setEmail($email);
        $student->setPhone($phone);
        $studentRepository->save($student);
        $this->addFlash("message", "Aluno {$student->getNome()} cadastrado com sucesso.");
        return $this->redirectToRoute("list_students");

    }

}
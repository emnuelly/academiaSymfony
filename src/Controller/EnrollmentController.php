<?php


namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnrollmentController extends AbstractController
{

    private $studentRepository;

    /**
     * EnrollmentController constructor.
     * @param $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }


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

        $form = $this->createForm(StudentType::class);

        return $this->render("enrollment/new.html.twig", [
            "claudio" => $form->createView()
        ]);
    }

    /**
     * @Route("/matricula", methods={"POST"}, name="finish_enrollment")
     */
    public function finishEnrollmentAction(Request $request) {
        $student = new Student();
        $studentForm = $this->createForm(StudentType::class, $student);
        $studentForm->handleRequest($request);

        if($studentForm->isValid() && $studentForm->isSubmitted()) {
            $this->studentRepository->save($student);
            $this->addFlash("message", "Aluno <b>{$student->getNome()}</b> cadastrado com sucesso.");
            return $this->redirectToRoute("list_students");
        }

        return $this->render("enrollment/new.html.twig", [
            "claudio" => $studentForm->createView()
        ]);

    }

    /**
     * @Route("/matricula/edit/{id}", methods={"GET"}, name="form_edit_student")
     */
    public function editEnrollmentAction(Student $student) {
        return $this->render("enrollment/edit.html.twig", ["student" => $student]);
    }

    /**
     * @Route("/matricula/edit/", methods={"POST"}, name="form_save_edit_student")
     */
    public function saveEditEnrollmentAction(Request $request) {
        $id = $request->get('id');
        $student = $this->studentRepository->find($id);
        $nome = $request->get('nome');
        $idade = $request->get('idade');

        $student->setNome($nome);
        $student->setIdade($idade);

        $this->studentRepository->update($student);

        $this->addFlash('message', 'Aluno '.$student->getNome().' atualizado com sucesso.');

        return $this->redirectToRoute("list_students");
    }

    /**
     * @Route("/matricula/remove/{id}", methods={"GET"}, name="form_remove_student")
     */
    public function removeEnrollmentAction(Student $student) {

        $this->studentRepository->remove($student);

        $this->addFlash('alert', 'Aluno '.$student->getNome().' removido com sucesso.');

        return $this->redirectToRoute("list_students");

    }



}
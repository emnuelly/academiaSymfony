<?php


namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class homeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function getHomeAction(){
        return $this->render('home.html.twig');
    }
}
<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(QuestionRepository $questionRepo): Response
    {
        $user = $this->getUser();
        $questions = $questionRepo->getQuestionsWithAuthors();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'questions' => $questions,
            'user' => $user
        ]);
        
    }

}

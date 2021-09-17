<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\GenresRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(NewsRepository $newsRepository, GenresRepository $genresRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'news' => $newsRepository->findAll(),
            'genre' => $genresRepository->findAll(),
        ]);
    }
}

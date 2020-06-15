<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Blog;
use App\Form\BlogType;
use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(BlogRepository $blogRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'blogs' => $blogRepository->findAll(),
        ]);
    }
}

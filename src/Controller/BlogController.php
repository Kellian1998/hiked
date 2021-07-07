<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'actualites')]
    public function index(): Response
    {

        $allblogs = $this->getDoctrine()->getRepository(Blog::class)->findAll();
        
        return $this->render('blog/index.html.twig', [
            'pagename' => 'actualites',
            'allblogs' => $allblogs,
        ]);
    }
}

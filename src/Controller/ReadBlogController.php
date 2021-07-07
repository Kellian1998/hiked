<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReadBlogController extends AbstractController
{
    #[Route('/read/blog/{slug}', name: 'read_blog')]
    public function index($slug): Response
    {
        $article = $this->getDoctrine()->getRepository(Blog::class)->findOneBy(array('slug' => $slug));
        return $this->render('read_blog/index.html.twig', [
            'article' => $article,
        ]);
    }
}

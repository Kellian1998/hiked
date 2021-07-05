<?php

namespace App\Controller\admin;

use App\Entity\Blog;
use App\Form\BlogType;
use App\Entity\Categorie;
use App\Form\CategorieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration/blog")
*/
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function index(Request $request): Response
    {
        $allblogs = $this->getDoctrine()->getRepository(Blog::class)->findAll();
        $allcat = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        $cat = new Categorie();
        $catform = $this->createForm(CategorieType::class, $cat);
        $catform->handleRequest($request);
        if ($catform->isSubmitted() && $catform->isValid()) {
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($cat);
         $entityManager->flush();
        return $this->redirectToRoute('blog');
        }

        return $this->render('admin/blog.html.twig', [
            'pagename' => 'blog',
            'catform' => $catform->createView(),
            'allcat' => $allcat,
            'allblogs' => $allblogs,
        ]);
    }

    /**
     * @Route("/writeblog", name="write_blog")
     */
    public function writeblog(Request $request): Response
    {
        $blog = new Blog();
        $blogform = $this->createForm(BlogType::class, $blog);
        $blogform->handleRequest($request);
        $today = date("d/m/Y");    
        $blog->setAuthor($this->getUser());
        $blog->setDate($today);
        $title = $blogform->get('title')->getData();
        $slugone = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slugone);
        $blog->setSlug($slug);

        if ($blogform->isSubmitted() && $blogform->isValid()) {
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($blog);
         $entityManager->flush();
        return $this->redirectToRoute('blog');
        }

        return $this->render('admin/writeblog.html.twig', [
            'pagename' => 'blog',
            'blogform' => $blogform->createView(),
        ]);
    }

    /**
     * @Route("/modifblog/{id}", name="modif_blog")
     */
    public function modifblog(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blog = $entityManager->getRepository(Blog::class)->find($id);
        $blogform = $this->createForm(BlogType::class, $blog);
        $blogform->handleRequest($request);
        $today = date("d/m/Y");    
        $blog->setAuthor($this->getUser());
        $blog->setDate($today);
        $title = $blogform->get('title')->getData();
        $slugone = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slugone);
        $blog->setSlug($slug);

        if ($blogform->isSubmitted() && $blogform->isValid()) {
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($blog);
         $entityManager->flush();
        return $this->redirectToRoute('blog');
        }

        return $this->render('admin/writeblog.html.twig', [
            'pagename' => 'blog',
            'blogform' => $blogform->createView(),
        ]);
    }

    /**
     * @Route("/deletecat/{id}", name="delete_cat")
     */
    public function delete_cat($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $cat = $entityManager->getRepository(Categorie::class)->find($id);

        $allarticles = $entityManager->getRepository(Blog::class)->findBy(['category' => $id]);
          
        if ($allarticles == null){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cat);
            $entityManager->flush();
        }
        else{
            $this->addFlash(
                'warning',
                'Vous ne pouvez pas supprimer une catégorie utilisée par un article. Supprimez l\'article ou changez la catégorie.'
            );
        }

        
        return $this->redirectToRoute('blog');
    }

    /**
     * @Route("/deleteblog/{id}", name="delete_blog")
     */
    public function delete_blog($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blog = $entityManager->getRepository(Blog::class)->find($id);
          
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($blog);
        $entityManager->flush();

        return $this->redirectToRoute('blog');
    }
}

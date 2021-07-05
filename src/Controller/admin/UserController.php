<?php

namespace App\Controller\admin;

use App\Entity\User;
use App\Form\ModifUserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration/user")
*/
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_admin")
     */
    public function index(): Response
    {
        $allusers = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('admin/user.html.twig', [
            'pagename' => 'utilisateurs',
            'users' => $allusers,
        ]);
    }

    /**
     * @Route("/modifuser/{id}", name="modif_user")
     */
    public function modifuser(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
        $userform = $this->createForm(ModifUserType::class, $user);
        $userform->handleRequest($request);

        if ($userform->isSubmitted() && $userform->isValid()) {
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($user);
         $entityManager->flush();
        return $this->redirectToRoute('user_admin');
        }

        return $this->render('admin/modifuser.html.twig', [
            'pagename' => 'blog',
            'user' => $user,
            'userform' => $userform->createView(),
        ]);
    }


    /**
     * @Route("/see/{id}", name="see_user")
     */
    public function see_user($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
        $allusers = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('admin/user.html.twig', [
            'pagename' => 'utilisateurs',
            'user' => $user,
            'users' => $allusers,
        ]);
    }

     /**
     * @Route("/delete/{id}", name="delete_user")
     */
    public function delete_user($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
          
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('user_admin');
    }

     /**
     * @Route("/infos/{id}", name="infos_user")
     */
    public function infos_user($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

        return $this->render('admin/user_infos.html.twig', [
            'pagename' => 'utilisateurs',
            'user' => $user,
        ]);
    }
}

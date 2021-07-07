<?php

namespace App\Controller;

use App\Entity\SavedRando;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {
        $userid = $this->getUser()->getId();
        $savedrandos = $this->getDoctrine()->getRepository(SavedRando::class)->findBy(array('user_id' => $userid));

        return $this->render('profil/index.html.twig', [
            'savedrandos' => $savedrandos,
        ]);
    }
}

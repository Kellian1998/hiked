<?php

namespace App\Controller;

use App\Entity\Rando;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EstRandoController extends AbstractController
{
    #[Route('/est/rando', name: 'est_rando')]
    public function index(): Response
    {
        $randos = $this->getDoctrine()->getRepository(Rando::class)->findBy(array('zone' => 'est'));
        return $this->render('est_rando/index.html.twig', [
            'randos' => $randos,
        ]);
    }
}

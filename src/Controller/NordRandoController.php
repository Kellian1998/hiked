<?php

namespace App\Controller;

use App\Entity\Rando;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NordRandoController extends AbstractController
{
    #[Route('/nord/rando', name: 'nord_rando')]
    public function index(): Response
    {
        $randos = $this->getDoctrine()->getRepository(Rando::class)->findBy(array('zone' => 'nord'));

        return $this->render('nord_rando/index.html.twig', [
            'randos' => $randos,
        ]);
    }
}

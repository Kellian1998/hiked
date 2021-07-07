<?php

namespace App\Controller;

use App\Entity\Rando;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SudRandoController extends AbstractController
{
    #[Route('/sud/rando', name: 'sud_rando')]
    public function index(): Response
    {
        $randos = $this->getDoctrine()->getRepository(Rando::class)->findBy(array('zone' => 'sud'));

        return $this->render('sud_rando/index.html.twig', [
            'randos' => $randos,
        ]);
    }
}

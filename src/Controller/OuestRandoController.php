<?php

namespace App\Controller;

use App\Entity\Rando;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OuestRandoController extends AbstractController
{
    #[Route('/ouest/rando', name: 'ouest_rando')]
    public function index(): Response
    {
        $randos = $this->getDoctrine()->getRepository(Rando::class)->findBy(array('zone' => 'ouest'));
        return $this->render('ouest_rando/index.html.twig', [
            'randos' => $randos,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Rando;
use App\Entity\SavedRando;
use App\Repository\SavedRandoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RandosController extends AbstractController
{
    /**
     * @Route("/randos", name="randos")
     */
    public function index(): Response
    {

        $randos = $this->getDoctrine()->getRepository(Rando::class)->findBy([],['id' => 'desc']);
        $entityManager = $this->getDoctrine()->getManager();

        return $this->render('randos/index.html.twig', [
            'controller_name' => 'RandosController',
            'randos' => $randos,
        ]);
    }
}

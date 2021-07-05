<?php

namespace App\Controller;

use App\Entity\Rando;
use App\Entity\SavedRando;
use App\Repository\SavedRandoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfosRandoController extends AbstractController
{
    /**
     * @Route("/infosrando/{id}", name="infos_rando")
     */
    public function index(SavedRandoRepository $SavedRandoRepository, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $rando = $entityManager->getRepository(Rando::class)->find($id);
        $savedrandos = $SavedRandoRepository->findByValues($this->getUser(), $id);

        return $this->render('infos_rando/index.html.twig', [
            'controller_name' => 'InfosRandoController',
            'rando' => $rando,
            'savedrandos' => $savedrandos,
        ]);
    }

    /**
     * @Route("/saverandos/{id}", name="saverandos")
     */
    public function save(SavedRandoRepository $SavedRandoRepository, $id): Response
    {
        return $this->redirectToRoute('randos');    
    }

    /**
     * @Route("/removerando/{id}", name="removerandos")
     */
    public function removesave($id): Response
    {
        return $this->redirectToRoute('randos');    
    }

}

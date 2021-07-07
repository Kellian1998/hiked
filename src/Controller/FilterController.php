<?php

namespace App\Controller;

use App\Entity\Rando;
use App\Form\FilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilterController extends AbstractController
{
    #[Route('/filter', name: 'filter')]
    public function index(Request $request): Response
    {
        $filterform = $this->createForm(FilterType::class);
        $filterform->handleRequest($request);

        $difficulty = $filterform->get('difficulty')->getData();
        $type = $filterform->get('type')->getData();
        $zone = $filterform->get('zone')->getData();
        $family = $filterform->get('family')->getData();
        $couple = $filterform->get('couple')->getData();
        $alone = $filterform->get('alone')->getData();
        $milieu = $filterform->get('milieu')->getData();

        $randos = $this->getDoctrine()->getRepository(Rando::class)->findBy(array(
        'difficulty' => $difficulty, 
        'type' => $type,
        'zone' => $zone,
        'family' => $family,
        'couple' => $couple,
        'solo' => $alone,
        'milieu' => $milieu
    ));

    dump($difficulty);
    dump($type);
    dump($zone);
    dump($family);
    dump($couple);
    dump($alone);
    dump($milieu);
    dump($randos);

        if ($filterform ->isSubmitted() && $filterform ->isValid()) {
            return $this->render('filter/index.html.twig', [
                'form' => $filterform->createView(),
                'state' => 1,
                'randos' => $randos,
            ]);
        }

        return $this->render('filter/index.html.twig', [
            'form' => $filterform->createView(),
            'state' => 0,
            'randos' => null,
        ]);
    }
}

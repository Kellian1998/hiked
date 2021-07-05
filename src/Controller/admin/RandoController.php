<?php

namespace App\Controller\admin;

use App\Entity\Rando;
use App\Form\RandoType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration/rando")
*/
class RandoController extends AbstractController
{
    /**
     * @Route("/", name="rando_admin")
     */
    public function rando(Request $request, PaginatorInterface $paginator): Response
    {
        $allrandos = $this->getDoctrine()->getRepository(Rando::class)->findBy([],['id' => 'desc']);;

        $pagrando = $paginator->paginate($allrandos, $request->query->getInt('page', 1), 5);

        $rando = new Rando();

        $form = $this->createForm(RandoType::class, $rando);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($rando);
         $entityManager->flush();
    
            return $this->redirectToRoute('rando_admin');
        }

        return $this->render('admin/rando.html.twig', [
            'pagename' => 'randonnees',
            'form' => $form->createView(),
            'randos' => $pagrando,
        ]);
    }

     /**
     * @Route("/delete/{id}", name="delete_rando")
     */
    public function delete_rando($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $rando = $entityManager->getRepository(Rando::class)->find($id);
          
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($rando);
        $entityManager->flush();

        return $this->redirectToRoute('rando_admin');
    }

    /**
     * @Route("/modif/{id}", name="modif_rando")
     */
    public function modif_rando(Request $request, $id): Response
    {
        $allrandos = $this->getDoctrine()->getRepository(Rando::class)->findAll();

        $entityManager = $this->getDoctrine()->getManager();
        $modifrando = $entityManager->getRepository(Rando::class)->find($id);
        $randoimg = $modifrando->getPhoto();
        $form = $this->createForm(RandoType::class, $modifrando)
        ->add('photo', TextType::class,[
            'disabled' => true,
            'label' => 'Photo de la randonnée :',
            'attr' => [
                'class' => 'form-control',
                'id' => 'exampleInputName1',
            ],
            'data' => $randoimg,
        ]);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($modifrando);
        $entityManager->flush();
        return $this->redirectToRoute('rando_admin');
        }

        return $this->render('admin/modifrando.html.twig', [
            'pagename' => 'randonnees',
            'form' => $form->createView(),
        ]);

    }
}

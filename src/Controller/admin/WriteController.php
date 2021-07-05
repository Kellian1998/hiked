<?php

namespace App\Controller\admin;

use DateTime;
use App\Entity\Message;
use App\Form\MessageType;
use App\Form\RespondType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration/write")
*/
class WriteController extends AbstractController
{
    /**
     * @Route("/", name="write")
     */
    public function index(Request $request): Response
    {

        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);

        $d = new DateTime('NOW');
        $message->setExp($this->getUser());
        $message->setDate($d);
        $message->setIsRead(0);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($message);
         $entityManager->flush();
    
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('admin/ecrire.html.twig', [
            'pagename' => 'write',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/write/{id}", name="respond")
     */
    public function respond(Request $request, $id): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $message = $entityManager->getRepository(Message::class)->find($id);
        $resp = new Message();
        $form = $this->createForm(RespondType::class, $resp);

        $d = new DateTime('NOW');
        $resp->setDest($message->getExp());
        $resp->setExp($this->getUser());
        $resp->setContent('Test');
        $resp->setDate($d);
        $resp->setIsRead(0);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($resp);
         $entityManager->flush();
    
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('admin/ecrire.html.twig', [
            'pagename' => 'write',
            'form' => $form->createView(),
        ]);
    }
}

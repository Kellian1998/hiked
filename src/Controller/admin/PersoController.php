<?php

namespace App\Controller\admin;

use App\Entity\Message;
use App\Entity\User;
use App\Repository\MessageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration/perso")
*/
class PersoController extends AbstractController
{
    /**
     * @Route("/{id}", name="perso")
     */
    public function index(MessageRepository $messageRepository, $id): Response
    {

        $sendmessages = $messageRepository->findBySendMessagesByUserId($id);
        $nonread = $messageRepository->findByRead($id);
        $nbnonlu = count($nonread);

        return $this->render('admin/perso.html.twig', [
            'pagename' => 'perso',
            'sendmessages' => $sendmessages,
            'nbnonlu' => $nbnonlu,
        ]);
    }

    /**
     * @Route("/intrec/{id}", name="intrec")
     */
    public function intrec(MessageRepository $messageRepository, $id): Response
    {

        $recevedmessages = $messageRepository->findByRecevedMessagesByUserId($id);
        $nonread = $messageRepository->findByRead($id);
        $nbnonlu = count($nonread);

        return $this->render('admin/perso.html.twig', [
            'pagename' => 'intrec',
            'recevedmessages' => $recevedmessages,
            'nbnonlu' => $nbnonlu,
        ]);
    }

    /**
     * @Route("/read/{id}", name="read_message")
     */
    public function read_message($id): Response
    {

        $message = $this->getDoctrine()->getRepository(Message::class)->findOneBy(array('id' => $id));
        
        if ($this->getUser() !== $message->getExp()){
            $message->setIsRead(1);
        }
        else{}

         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($message);
         $entityManager->flush();

        return $this->render('admin/read.html.twig', [
            'pagename' => 'read',
            'message' => $message,
        ]);
    }

    /**
     * @Route("/clear/{id}", name="clear")
     */

    public function clear(MessageRepository $messageRepository, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $message = $entityManager->getRepository(Message::class)->findOneBy(['dest' => $id]);
        $nobody = $entityManager->getRepository(User::class)->findOneBy(['id' => '17']);

        $message->setDest($nobody);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($message);
        $entityManager->flush();

        $recevedmessages = $messageRepository->findByRecevedMessagesByUserId($id);
        $nonread = $messageRepository->findByRead($id);
        $nbnonlu = count($nonread);

        return $this->render('admin/perso.html.twig', [
            'pagename' => 'intrec',
            'recevedmessages' => $recevedmessages,
            'nbnonlu' => $nbnonlu,
        ]);
    }


}

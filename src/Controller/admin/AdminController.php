<?php

namespace App\Controller\admin;

use App\Repository\MessageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("", name="dashboard")
     */
    public function index(MessageRepository $messageRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'pagename' => 'accueil',
        ]);
    }
}

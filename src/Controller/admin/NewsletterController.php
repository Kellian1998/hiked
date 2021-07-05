<?php

namespace App\Controller\admin;

use App\Entity\Newsletter;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/administration/newsletter")
*/
class NewsletterController extends AbstractController
{
    /**
     * @Route("/", name="newsletter")
     */
    public function index(): Response
    {

        $allmails = $this->getDoctrine()->getRepository(Newsletter::class)->findAll();

        $this->export();

        return $this->render('admin/newsletter.html.twig', [
            'pagename' => 'newsletter',
            'mails' => $allmails,
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete_mail")
     */
    public function delete_mail($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $mail = $entityManager->getRepository(Newsletter::class)->find($id);
          
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($mail);
        $entityManager->flush();

        return $this->redirectToRoute('newsletter');
    }

    private function getData(): array
    {
        /**
         * @var array Newsletter[]
         */
        $list = array();
        
        
        $mails = $this->getDoctrine()->getRepository(Newsletter::class)->findBy(['canceled' => 0]);

        foreach ($mails as $mail) {
            array_push($list, $mail->getEmail());
        }
        return $list;
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Liste de mails de la newsletter');

        // Increase row cursor after header write
            $sheet->fromArray($this->getData());
        

        $writer = new Csv($spreadsheet);

        $writer->save('csv/export_newsletter.csv');

        return $this->redirectToRoute('newsletter');
    }
}

<?php

namespace App\Controller;

use App\Entity\Employe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Routing\Annotation\Route;
use app\form\EmployeType;

class EmployeController extends AbstractController
{
    /**
     * @Route("/", name="employe")
     */
    public function index()
    {
        $employes = $this->getDoctrine()->getRepository(Employe::class)->findAll();
        return $this->render('employe/index.html.twig', [
            'employes' => $employes
        ]);
    }

    /**
     * @Route("/detail/{employe}", name="detail_employe")
     */
    public function detailEmploye(Employe $employe)
    {
        return $this->render('employe/detail.html.twig', ['employe'=> $employe]);
    }

    /**
     * @Route("/addEmploye", name="add_employe")
     */
    public function addEmploye()
    {
        // $article = new Article;
        // $article->setTitle('oscour');
        // $article->setImage('skur');
        // $article->setContent('lorem etc etc');
        // $entityManager = $this->getDoctrine()->getManagers();

        // $entityManager->persist($article);
        // $entityManager->flush();

        // return $this->redirectToRoute('article');

        $form = $this->createForm(EmployeType::class, new Employe);
        return $this->render('employe/addEmploye.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/employe/{employe}/delete", name="delete_employe")
     */
    public function deleteEmploye(Employe $employe)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($employe);
        $entityManager->flush();

        $employes = $this->getDoctrine()->getRepository(Employe::class)->findAll();

        return $this->render('employe/index.html.twig', [
            'employes' => $employes
        ]);
    }
    
}

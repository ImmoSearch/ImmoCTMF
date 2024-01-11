<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Form\FormAType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class formController extends AbstractController
{
    /**
     * @Route("/admin/form", name="app_admin_form")
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {

        // Fetch the annonces from the database
        $lesAnnonces = $manager->getRepository(Annonce::class)->findAll();

        // Create a new Annonce instance for the form
        $annonce = new Annonce();

        $form = $this->createForm(FormAType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($annonce);
            $manager->flush();
            $this->addFlash("success", "L'annonce a été ajoutée/modifiée avec succès");
            return $this->redirectToRoute('app_admin_form');
        }
        
        return $this->render('admin/formAnnonce.html.twig', [
            'controller_name' => 'formController',
            'formAnnonce' => $form->createView()
        ]);
    }
}

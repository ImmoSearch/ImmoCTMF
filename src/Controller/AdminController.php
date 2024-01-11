<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\FormAType;
use App\Form\AnnonceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="adminA")
     */
    public function ajoutAnnonces(Request $request, EntityManagerInterface $manager)
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

        return $this->render('admin/cruda.html.twig', [
            'formAnnonce' => $form->createView(),
            'lesAnnonces' => $lesAnnonces,
        ]);
    }
    
    /**
     * @Route("admin/annonce/supression/{id}", name="admin_annonces_suppression",methods={"GET"})
     */
    // public function suppressionAnnonce(Annonce $annonce,  EntityManagerInterface $manager)
    // {
    //     $manager->remove($annonce);
    //     $manager->flush();
    //     $this->addFlash("success","L'annonce a annonce été supprimé");
    //     return $this->redirectToRoute('admin_annonces');
    // }
}

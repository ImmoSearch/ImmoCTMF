<?php

// src/Controller/ListeBiensController.php

namespace App\Controller;

use App\Entity\biens;
use App\Repository\BiensRepository;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeBiensController extends AbstractController
{
    /**
     * @Route("/biens", name="biens", methods={"GET"})
     */
    public function listeBiens(AnnonceRepository $repo):Response
    {
        $annonces = $repo->findAll();
        return $this->render('liste_biens/listeBiens.html.twig', [
            'lesAnnonces' => $annonces
        ]);
    }
}



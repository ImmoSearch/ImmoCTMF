<?php

// src/Controller/ListeBiensController.php

namespace App\Controller;

use App\Entity\biens;
use App\Repository\BiensRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeBiensController extends AbstractController
{
    /**
     * @Route("/biens", name="biens", methods={"GET"})
     */
    public function listeBiens(BiensRepository $repo)
    {
        $biens = $repo->findAll();
        return $this->render('liste_biens/listeBiens.html.twig', [
            'LesBiens' => $biens
        ]);
    }
}



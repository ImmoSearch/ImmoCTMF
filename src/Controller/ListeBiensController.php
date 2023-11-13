<?php

namespace App\Controller;

use App\Entity\ListeBiens;
use App\Repository\ListeBiensRepository; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeBiensController extends AbstractController
{
    /**
     * @Route("/Biens", name="biens", methods={"GET"})
     */
    public function listeBiens(listeBiensRepository $repo): Response
    {
        $biens = $repo->findAll(); 
        return $this->render('liste_biens/listeBiens.html.twig', [
            'lesBiens' => $biens
        ]);
    }
}

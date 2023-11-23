<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaisonController extends AbstractController
{
    /**
     * @Route("/maison", name="maison",methods={"GET"})
     */
    public function listeMaisons(MaisonRepository $repo)
    {
        
        $Maisons=$repo->listeMaisonsComplete();
        return $this->render('maison/listeMaison.html.twig', [
            'lesMaisons'=> $Maisons
        ]);
    }
}

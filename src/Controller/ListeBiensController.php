<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeBiensController extends AbstractController
{
    /**
     * @Route("/biens", name="biens", methods={"GET"})
     */
    public function listeBiens(AnnonceRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $biens = $paginator->paginate(
            $repo->listeAnnoncesCompletePaginee(),
            $request->query->getInt('page', 1),
            9
        );

        return $this->render('biens/listeBiens.html.twig', [
            'lesAnnonces' => $biens
        ]);
    }

    /**
     * @Route("/bien/{id}", name="ficheBien", methods={"GET"})
     */
    public function ficheBien(Annonce $annonce)
    {
        return $this->render('biens/ficheBiens.html.twig', [
            'leAnnonce' => $annonce
        ]);
    }
}
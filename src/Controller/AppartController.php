<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppartController extends AbstractController
{
    /**
     * @Route("/appart", name="app_appart")
     */
    public function index(): Response
    {
        return $this->render('appart/index.html.twig', [
            'controller_name' => 'AppartController',
        ]);
    }
}

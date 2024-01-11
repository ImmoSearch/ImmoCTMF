<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class formController extends AbstractController
{
    /**
     * @Route("/admin/form", name="app_admin_form")
     */
    public function index(): Response
    {
        return $this->render('admin/formAnnonce.html.twig', [
            'controller_name' => 'formController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }


    #[Route('/contact/contact_afficher', name: 'contact_afficher')]
    public function index2(): Response
    {
        return $this->render('contact/afficher_contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/contact/ajouter_contact', name: 'ajouter_contact')]
    public function index3(): Response
    {
        return $this->render('contact/ajouter_contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

}

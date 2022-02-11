<?php

namespace App\Controller;
use App\Controller\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use symfony\Component\HttpFoundation\request;




class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }



    #[Route('/contact/contact_afficher', name: 'afficher_contact')]
    public function afficher_contacts(ContactRepository $repoContact): Response
    
    {
        $contacts = $repoContact->findAll();

        return $this->render('admin/index.html.twig', [
           /* 'controller_name' => 'ContactController',*/
           "contacts" => $contacts,
        ]);
    }


    #[Route('/contact/contact_ajouter', name: 'ajouter_contact')]
    public function ajouter_contacts(Request $request,EntityManagerInterface $manager): Response
    
    {
        $contact = new Contact;
        $form = $this->creatForm(ContactType::class,$contact);
        $form->handleRequest($request);

        //if () {
            # code...
        //}

        return $this->render('admin/index.html.twig', [
           /* 'controller_name' => 'ContactController',*/
           "contacts" => $contacts,
        ]);
    }






}

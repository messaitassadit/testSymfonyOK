<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use symfony\Component\HttpFoundation\request;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;



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


    #[Route('/contact/ajouter_contact', name: 'ajouter_contact')]
    public function ajouter_contacts(Request $request,EntityManagerInterface $manager): Response

    {
        $contact = new Contact;
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {

          //dd($request);

          $manager->persist($contact);
          $manager->flush();

          $this->addFlash('success', 'Bonjour'.$contact->getPrenom()."vous avez bien été ajouté suer la BDD");
          return $this->redirectToRoute('afficher_contact');
          //dd($contact);
        }


        return $this->render('admin/ajouter_contact.html.twig', [
            
            "formContact" => $form->createView(),
            //"contact"=>$contact
        ]);
    }

        #[Route('/contact/modifier_contact/{id}', name: 'contact_editer')]
        public function editer_contacts (Contact $contact, Request $request, EntityMangerInterface $manager) : Response

               {
                   $form=$this->createForm(ContactType::class, $contact);

                   $form->handleRequest($request);
                   if ($form->isSubmitted()&&$form->isValid()) {

                    $manager->persist($contact);
                    $manager->flush();
                    $this->addFlash("success", "le contact".$contact->getPrenom()."a bien été modifié");

                    return $this->redirectToRoute('afficher_contact');
                       
                   }


            return $this->render('admin/index.html.twig', [
                'controller_name' => 'AdminController',
                "contacts" => $contact
            ]);
        }

    }
}

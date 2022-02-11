<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;










class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' ,TextType::class,[
                "label" => "nom",
                "required" => true,
                "attr" => [
                    "placeholder" => "saisir le nom",
                    "Class" => "border border-primary"
                ]

            ])

            ->add('prenom',TextType::class,[
                      
            "label" => "prenom",
                "required" => true,
                "attr" => [
                    "placeholder" => "saisir le prenom:",
                    "Class" => "border border-primary"
                ]
                ])
            
            
            
            
            ->add('email',TextType::class,[
                "label" => "Adresse mail:",
            "required" => true,
                "attr" => [
                    "placeholder" => "saisir l'adresse mail",
                    "Class" => "border border-primary"
                ]
                ])
            
            
            
            
            
            ->add('created_at', TextType::class,[

                "label" => "Date d'ajout:",
            "required" => true,
                "attr" => [
                    "placeholder" => "entrer une date",
                    "Class" => "border border-primary"
                ]

            ])
             
            ->add('updated__at', TextType::class,[

                "label" => "Date de modification:",
            "required" => true,
                "attr" => [
                    "placeholder" => "entrer une date",
                    "Class" => "border border-primary"
                ]

            ])  

             ->add('ajouter', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

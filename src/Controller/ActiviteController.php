<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Entity\Utilisateur;
use App\Entity\MoyenTransport;
use App\Repository\ActivitesRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ActiviteController extends AbstractController
{
   
    public function Activite1(Request $request, EntityManagerInterface $em): Response
    {   
        $user = $this->getUser();
        $activite= new Activites();
        $form=$this->createFormBuilder($activite)
            ->add ('titre_activite', TextType::class,[
                'attr' => ['cols'=>"100",
                'rows'=>"10",]
            ])
            ->add ('description_activite', TextareaType::class, [
                'attr' => [ 'cols'=>"100", 
                'rows'=>"10",]
            ])
            ->getForm();

            $form->handlerequest($request);

        if($form->isSubmitted()&& $form->isValid()){

            // récupèrération de l'id en faisant le lien entre utilisateur et activite
   
            $activite->setUtilisateur($user);
            $em->persist($activite);
            $em->flush();
            $this->addFlash('success', 'Données enregistrées');
            return $this->redirectToRoute('handy_activite_beneficiaire2');
        }
        

        return $this->render('activite/activite1/index.html.twig',[
            'formActivite'=> $form->createView()
        ]);
    }

     public function Activite2(EntityManagerInterface $em, Request $request, ActivitesRepository $activitesRepository): Response
    {   
        // $user = $this->getUser();
        // dd($this->getUser());
        $user = $this->getUser();
        //Récupère l'adresse 1 de l'utilisateur et ca l'a met dans adresse
        $adresse = $user->getAdresse1();
        // Déclaration de la variable activite de la class activite (qui reprendra les mêmes noms)
        $activite= $activitesRepository->findOneBy(['utilisateur' => $user->getId()], ['id' => 'DESC']);
        //Création Formulaire
        // Les Add sont les propriétés du formulaires, 3 paramètres (propriétés, type de la propriétés, tableau d'option)
        $form=$this->createFormBuilder($activite)
            ->add ('adresse_activite', TextType::class, [
            'label'=>"Lieu de l'activité"])
            ->add ('code_postal_activite',TextType::class, [
                'label'=>'Code postal'])
            ->add ('ville_activite',TextType::class, [
                'label'=>'Ville'])
            ->add ('adresse_depart',ChoiceType::class, [
                //Choices est un type pour les radios, liste déroulante
                'choices' => [
                    $adresse => $adresse,
                    'Créer une autre adresse' => false
                ],
                'label'=>'Adresse de rendez-vous',
                //C'est ici que l'on teste
                'expanded' => true,
                'multiple' => false
                
                ])
            ->add ('adresse_retour',ChoiceType::class, [
                'choices' => [
                    $adresse => $adresse,
                    'Créer une autre adresse' => false
                    ],
                'label'=>'Adresse de retour',
                'expanded' => true,
                'multiple' => false
                    
                ])
                //il faut qu'il y est une relation entre les deux entité pour pouvoir l'appeler ainsi que ses propriétés dans un même formulaire
            ->add ('moyen_transport', EntityType::class, [
                    'class' => MoyenTransport::class,
                    'choice_label' => 'label',
                    'label'=> 'Transport',
                    'expanded' => false,
                    'multiple' => false,
                    'mapped' => true,
                ])
            ->add('submit', SubmitType::class, [
                'label'=> 'Etape suivante',
            ])  
            
                       
            ->getForm();
                          
                //Récupère le formulaire
            $form->handlerequest($request);
                //Traite l'information et écoute le bouton submit
            if($form->isSubmitted() && $form->isValid()){
                // dd($form);
                // récupèrération de l'id en faisant le lien entre utilisateur et activite
                // $activite->setUtilisateur($user);
                //Fige la data et prépare la requete
                $em->persist($activite);
                //excetute la requete
                $em->flush();    
                
                //Message pour l'utilisateur si tout est ok ou pas
                $this->addFlash('success', 'Données enregistrées');
                $this->addFlash('danger', 'Problème formulaire');
                //Apreès formulaire on se redirige vers la route ....
                return $this->redirectToRoute('handy_activite_beneficiaire3');
            }       
             
        return $this->render('activite/activite2/index.html.twig',[
            'formLieu'=> $form->createView(),
           
        ]);
    }

    public function Activite3(EntityManagerInterface $em, Request $request,ActivitesRepository $activitesRepository): Response
    {   
        
        $user = $this->getUser();

        $activite= $activitesRepository->findOneBy(['utilisateur' => $user->getId()], ['id' => 'DESC']);
        $form=$this->createFormBuilder($activite)
            ->add ('date_debut', DateTimeType::class, [
                'date_widget'=> 'single_text'
            ])
            ->add ('date_fin', DateTimeType::class, [
                'date_widget'=> 'single_text'
            ])
            
            ->getForm();
            
        $form->handlerequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $em->persist($activite);
            $em->flush();
        
            $this->addFlash('success', 'Données enregistrées');
            $this->addFlash('danger', 'Problème formulaire');
              
            return $this->redirectToRoute('handy_home_beneficiaire');
        }
        

        return $this->render('activite/activite3/index.html.twig',[
            'formDate'=> $form->createView()
        ]);
    }
    
}

<?php

namespace App\Controller;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CompetencesRepository;
use App\Repository\TextcontainerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CompetencesRepository $CompetencesRepository,TextcontainerRepository $TextcontainerRepository, Request $request, \Swift_Mailer $mailer ): Response
    {
        $form = $this->createForm(ContactType::class); // crée un formulaire de contact
        $form->handleRequest($request);

        $technologie = $CompetencesRepository->findBy(array('category' => "technologie")) ;

        $framework= $CompetencesRepository->findBy(array('category' => "Framework")) ;

        $cms= $CompetencesRepository->findBy(array('category' => "Cms")) ;

        $text = $TextcontainerRepository->findOneBy(array('id'=>1));
        // aurait du s'appeler par un parametre "zone" pour gérer différents textes de manière efficace mais probleme de bdd (( ! ) Fatal error: Uncaught Error: Unknown named parameter $create_add_field in C:\wamp64\apps\phpmyadmin5.0.2\vendor\symfony\dependency-injection\ContainerBuilder.php on line 1144)


        if ($form->isSubmitted() && $form->isValid()) { // formulaire soumis et valide
            $contact = $form->getData(); // recup les données 




            $mail = (new \Swift_Message('Contact depuis le portfolio ')) //prepare le mail
                ->setFrom($contact['email'], $contact['email']) // défini l'expediteur
                ->setTo('bastienpiperel@gmail.com') // définit le destinataire
                ->setBody(
                    $this->renderView('home/emailContact.html.twig', [
                        'nom' => $contact['Nom'],
                        'prenom' => $contact['Prenom'],
                        'email' => $contact['email'],
                        'message' => $contact['message'],

                    ]),
                    'text/html'
                ); // définit le corps du message text/html défini le format du mail a envoyer

            if ($contact['fichier']) { // verifie si il y a un fichier
                $extensionfichier = $contact['fichier']->guessExtension(); // récupère l'extension.
                $pieceJointe = \Swift_Attachment::fromPath(($contact['fichier']->getPathName())) // prépare la piece jointe à partir d'un chemin
                    ->setFilename('fichier.' . $extensionfichier) // défini le nom du fichier
                ;
                $mail->attach($pieceJointe); // attache la piece jointe au mail
            }




            $mailer->send($mail);
            return $this->redirectToRoute('home');
        }
















        return $this->render('home/index.html.twig', ['technologies' => $technologie, 'Cms'=> $cms, "Framework" => $framework,"text" => $text, 'contactForm' => $form->createView()
        ]);
    }
}

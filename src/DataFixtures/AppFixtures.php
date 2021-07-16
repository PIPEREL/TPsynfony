<?php

namespace App\DataFixtures;

use App\Entity\Competences;
use App\Entity\Textcontainer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // $maison = new Maison();
        // $maison->setTitle("jolie maison de campagne");
        // $maison->setDescription("jolie maison de campagne en bordure de rivière avec 2 hectare attenant");
        // $maison->setSurface(185);
        // $maison->setRooms(12);
        // $maison->setBedrooms(6);
        // $maison->setPrice(580000);
        // $maison->setImg1('maison-1-png');
        // $manager->persist($maison); // la met en liste d'attente pour l'envoit 
      
        
        $text = new  Textcontainer();
        $text->setTexte("Faisant preuve de curiosité professionnelle et avide de nouvelles connaissances, j'aime apprendre - et comprendre - autant sur le plan professionnel que personnel et relationnel.");
        $manager->persist($text);

        $competence1 = new Competences();
        $competence1->setName('html');
        $competence1->setCategory('technologie');
        $manager->persist($competence1);

        $competence2 = new Competences();
        $competence2->setName('css');
        $competence2->setCategory('technologie');
        $manager->persist($competence2);

        $competence3 = new Competences();
        $competence3->setName('php');
        $competence3->setCategory('technologie');
        $manager->persist($competence3);

        $competence4 = new Competences();
        $competence4->setName('javascript');
        $competence4->setCategory('technologie');
        $manager->persist($competence4);

        $competence5 = new Competences();
        $competence5->setName('MySql');
        $competence5->setCategory('technologie');
        $manager->persist($competence5);

        $competence6 = new Competences();
        $competence6->setName('Symfony');
        $competence6->setCategory('Framework');
        $manager->persist($competence6);

        $competence7 = new Competences();
        $competence7->setName('Bootstrap');
        $competence7->setCategory('Framework');
        $manager->persist($competence7);

        $competence8 = new Competences();
        $competence8->setName('Tailwind');
        $competence8->setCategory('Framework');
        $manager->persist($competence8);
        
        $competence9 = new Competences();
        $competence9->setName('Wordpress');
        $competence9->setCategory('Cms');
        $manager->persist($competence9);


        $manager->flush();
    }
}

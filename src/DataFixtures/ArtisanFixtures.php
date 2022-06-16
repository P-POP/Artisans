<?php

namespace App\DataFixtures;

use App\Entity\Artisan;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArtisanFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<10; $i++){


           //Instancie l'entité avec laquelle travailler
           $artisans = new Artisan();
           $artisans->setName("Name_$i");
           $artisans->setAddress("Adress du numero_$i");
           $artisans->setPhone(random_int(400000000,499999999));
           $artisans->setEmail("email@_$i");
           $artisans->setDescription("Description_$i");
           $artisans->setCover("Description_$i");
           // Met de côté les données en attente d'insertion
           $manager->persist($artisans);
       }

       $manager->flush();
    }
}

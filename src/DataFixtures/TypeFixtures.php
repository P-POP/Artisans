<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<5; $i++){

            //Instancie l'entité avec laquelle travailler
            $types = new Type();
            $types->setName("Famille_de_metier_$i");
            
            $manager->persist($types);
            
        }
        
        $manager->flush();
    }
}

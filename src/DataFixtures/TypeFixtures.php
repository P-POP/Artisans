<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nom = [ "Travaux", 'Bien-être',"Préstation de Service","Alimentaire"];

        for ($i=0; $i < count($nom) ; $i++) { 
           //Instancie l'entité avec laquelle travailler
           $types = new Type();
           $types->setName($nom[$i]);
           
           $manager->persist($types);
           
        }
            
        
        
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Owner;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OwnerFixtures extends Fixture
{

    

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<10; $i++){


            //Instancie l'entité avec laquelle travailler
            $owners = new Owner();
            $owners->setAvis("Avis_$i");
            $owners->setScore(3);

            $owners->setUser($this->getReference("user_". rand(0, 11)));
         
            $manager->persist($owners);
            
           
        }
        
        $manager->flush();
    }


public function getDependencies()
{
        return [
            UserFixtures::class
        ];
    }
}

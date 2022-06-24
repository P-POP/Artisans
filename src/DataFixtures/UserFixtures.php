<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<10; $i++){


            //Instancie l'entité avec laquelle travailler
            $user = new User();
            $user->setEmail("email@_$i");
            $password = $this->hasher->hashPassword($user, 'secret');
            $user->setPassword($password);;
            $user->setLastName("LastName_$i");
            $user->setFisrtName("FirstName_$i");
            $user->setPseudo("Pseudo_$i");

            $this->addReference("user_$i", $user);
            // Met de côté les données en attente d'insertion
            $manager->persist($user);
        }
        $manager->flush();
    }
}

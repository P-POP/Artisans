<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        
      

        for ($i = 0; $i < 4; $i++) {
           $users = new User();
           $users->setEmail("email@_$i");
           $password = $this->hasher->hashPassword($users, 'pass_1234');
           $users->setPassword($password);

           $this->addReference("user_$i", $users);
           
           
         
           $manager->persist($users);
        }

          $manager->flush();
    }
}





<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
      

        for ($i = 0; $i < 4; $i++) {
           $users = new User();
           $users->setEmail("email@_$i");
           $password = $this->hasher->hashPassword($user, 'pass_1234');
           $users->setPassword("$password");
           
         
           $manager->persist($user);
        }

          $manager->flush();
    }
}





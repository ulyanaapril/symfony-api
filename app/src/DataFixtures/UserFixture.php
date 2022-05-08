<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setPassword('user');
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $this->addReference($user->getEmail(), $user);
        $manager->persist($user);
        $manager->flush();
    }
}

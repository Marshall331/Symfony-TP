<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create(locale: 'fr_FR');

        // Création des 30 utilisateurs
        $users = [];
        for ($i = 0; $i < 25; $i++) {
            $user = new User();

            $user->setFullName($faker->firstName())
            ->setEmail($faker->email())
            ->setPassword($faker->password());
            // ->setCre
            // ->set


            // $manager->persist($user);
            // $users[] = $user;
        }
        $manager->flush();

        $manager->flush();
    }
}

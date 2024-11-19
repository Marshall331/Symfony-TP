<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Profile;
use App\Entity\User;
use App\Entity\Address;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTime;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create(locale: 'fr_FR');

        // Création des 30 utilisateurs
        $users = [];
        for ($i = 0; $i < 30; $i++) {
            $user = new User();

            $user->setFullName($faker->firstName())
                ->setEmail($faker->email())
                ->setPassword($faker->password())
                ->setCreatedAt(new \DatetimeImmutable());

            $manager->persist($user);
            $users[] = $user;
        }
        $manager->flush();


        // Création des 30 adresses
        $adresses = [];
        for ($i = 0; $i < 30; $i++) {

            $adresse = new Address;

            $adresse->setStreet($faker->streetName())
                ->setCodePostal($faker->postcode())
                ->setCity($faker->city())
                ->setCountry($faker->country())
                ->setCreatedAt(new \DatetimeImmutable())
                ->setUser($users[$i]);

            $manager->persist($adresse);
            $adresses[] = $adresse;
        }
        $manager->flush();


        // Création des 30 profile
        $profiles = [];
        for ($i = 0; $i < 30; $i++) {

            $profile = new Profile();

            $profile->setPicture($faker->imageUrl())
                ->setCoverPicture($faker->imageUrl())
                ->setDescription($faker->sentence())
                ->setCreatedAt(new \DatetimeImmutable())
                ->setUser($users[$i]);

            $manager->persist($profile);
            $profiles[] = $profile;
        }
        $manager->flush();


        // Création des 10 categories
        $categories = [];
        for ($i = 0; $i < 30; $i++) {

            $categorie = new Category();

            $categorie->setName($faker->word())
                ->setDescription($faker->sentence())
                ->setDescription($faker->sentence())
                ->setImageUrl($faker->imageUrl())
                ->setCreatedAt(createdAt: new \DatetimeImmutable());

            $manager->persist($categorie);
            $categories[] = $categorie;
        }
        $manager->flush();


        // Création des 100 articles
        $articles = [];
        for ($i = 0; $i < 100; $i++) {

            $article = new Article();

            $article->setTitle($faker->word())
                ->setContent($faker->sentence(2))
                ->setImageUrl("https://picsum.photos/200?image=" . $faker->numberBetween(100, 500))
                ->setCreatedAt(new \DatetimeImmutable())
                ->setUser($faker->randomElement($users))
                ->addCategory($faker->randomElement($categories));

            $manager->persist($article);
            $articles[] = $article;
        }
        $manager->flush();
    }
}

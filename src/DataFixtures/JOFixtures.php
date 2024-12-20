<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Profile;
use App\Entity\User;
use App\Entity\Address;
use App\Entity\Athlete;
use App\Entity\Category;
use App\Entity\Discipline;
use App\Entity\Pays;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTime;

class JOFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create(locale: 'fr_FR');

        $continents = [
            "Europe" ,
            "Afrique",
            "Asie",
            "Amérique du nord",
            "Amérique du sud",
            "Océanie",
            "Antarctique"
        ];

        // création des 10 pays
        $paysListe = [];
        for ($i = 0; $i < 10; $i++) {
            $pays = new Pays();

            $pays->setCodeCio($faker->regexify('[A-Z]{3}'))
                ->setNomPays($faker->country())
                ->setNomContinent($faker->randomElement($continents))
                ->setEmblemePays("https://picsum.photos/200?image=" . $faker->numberBetween(100, 500));

            $manager->persist($pays);
            $paysListe[] = $pays;
        }
        $manager->flush();


        // création des 20 disciplines
        $disciplines = [];
        for ($i = 0; $i < 20; $i++) {
            $discipline = new Discipline();

            $discipline->setNomDis($faker->sentence())
                ->setSportDis($faker->word())
                ->setDescriptionDis($faker->word())
                ->setLogoDis("https://picsum.photos/200?image=" . $faker->numberBetween(100, 500));

            $manager->persist($discipline);
            $disciplines[] = $discipline;
        }
        $manager->flush();


        // création des 25 athlètes
        for ($i = 0; $i < 25; $i++) {
            $athlete = new Athlete();

            $athlete->setNomPrenom($faker->firstName()  . ' ' . $faker->lastName())
                ->setDateNaiss(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-100 years', '-18 years')))
                ->setPhoto("https://picsum.photos/200?image=" . $faker->numberBetween(100, 500))
                ->setGenre($faker->randomElement(['F', 'M']))
                ->setTaille(number_format($faker->randomFloat(2, 1.50, 2.50), 2, '.', ''))
                ->setPoids(number_format($faker->randomFloat(2, 50, 99.99), 2, '.', ''))
                ->setPays($faker->randomElement($paysListe));

            for ($j = 0; $j < $faker->numberBetween(1, 2); $j++) {
                $athlete->addDiscipline($faker->randomElement($disciplines));
            }

            $manager->persist($athlete);
        }
        $manager->flush();
    }
}

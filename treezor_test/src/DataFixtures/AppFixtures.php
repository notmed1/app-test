<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private Generator $faker;
        
    public function __construct()
    {
        $this->faker = Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 30; $i++) { 
            $user = new User();
            $user->setLastName($this->faker->word(1))
            ->setFirstName($this->faker->word(1))
            ->setEmail($this->faker->email())
            ->setBirthdayDate($this->faker->dateTime())
            ->setActive($this->faker->boolean);
            $manager->persist($user);
        }

        $manager->flush();
    }
}

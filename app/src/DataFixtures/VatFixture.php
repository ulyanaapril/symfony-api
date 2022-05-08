<?php

namespace App\DataFixtures;

use App\Entity\Vat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VatFixture extends Fixture
{
    private $faker;

    public function __construct() {

        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager) {

        for ($i = 0; $i < 3; $i++) {
            $manager->persist($this->getVat());
        }
        $manager->flush();
    }

    private function getVat() {

        $product =  new Vat(
            $this->faker->numberBetween(1,19)
        );
        return $product;
    }
}

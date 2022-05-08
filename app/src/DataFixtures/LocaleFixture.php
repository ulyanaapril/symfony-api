<?php

namespace App\DataFixtures;

use App\Entity\Locale;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LocaleFixture extends Fixture
{
    private $faker;

    public function __construct() {

        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager) {

        for ($i = 0; $i < 3; $i++) {
            $manager->persist($this->getLocale());
        }
        $manager->flush();
    }

    private function getLocale() {

        $localeCode = $this->faker->languageCode();
        $product =  new Locale(
            $localeCode,
            $localeCode
        );
        return $product;
    }
}

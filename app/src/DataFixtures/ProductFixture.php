<?php

namespace App\DataFixtures;

use App\Entity\Vat;
use App\Repository\ProductRepository;
use App\Repository\VatRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixture extends Fixture implements DependentFixtureInterface
{
    private $faker;

    private $vatRepository;

    public function __construct(VatRepository $vatRepository) {

        $this->faker = Factory::create();
        $this->vatRepository = $vatRepository;
    }

    public function getDependencies()
    {
        return [VatFixture::class];
    }

    public function load(ObjectManager $manager) {

        $vats = $this->vatRepository->findAll();

        foreach ($vats as $vat) {
            $manager->persist(
                $product = new Product(
                    $this->faker->word(),
                    $this->faker->text(100),
                    $this->faker->randomFloat(2, 2, 5),
                    $vat
                )
            );
        }
        $manager->flush();
    }

}

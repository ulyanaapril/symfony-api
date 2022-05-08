<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Repository\VatRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Repository\LocaleRepository;
use Faker\Factory;

class CountryFixture extends Fixture implements DependentFixtureInterface
{
    private $faker;

    private $vatRepository;

    private $localeRepository;

    public function __construct(VatRepository $vatRepository, LocaleRepository $localeRepository) {
        $this->vatRepository = $vatRepository;
        $this->localeRepository = $localeRepository;

        $this->faker = Factory::create();
    }

    public function getDependencies()
    {
        return [VatFixture::class, LocaleFixture::class];
    }

    public function load(ObjectManager $manager): void
    {
        $locales = $this->localeRepository->findAll();
        $i = 0;
        foreach ($locales as $locale) {
            $i++;
            $vat = $this->vatRepository->findBy([],['id'=>'DESC'],1,$i);
            if (!empty($vat[0])) {
                $manager->persist(
                    new Country(
                        $locale->getIso(),
                        $locale,
                        $vat[0]
                    )
                );
            }

        }
        $manager->flush();
    }
}

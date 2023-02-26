<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Tax;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private const TAX = [
        'DE' => 0.19,
        'IT' => 0.22,
        'GR' => 0.24,
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TAX as $taxPrefix => $taxValue) {
            $tax = new Tax();

            $tax->setTaxPrefix($taxPrefix);
            $tax->setTax($taxValue);

            $manager->persist($tax);
        }

        $faker = Factory::create();

        for ($i = 0; $i < 10; ++$i) {
            $product = new Product();

            $product->setTitle($faker->words(asText: true));
            $product->setPrice($faker->numberBetween(1, 9) * 100);

            $manager->persist($product);
        }

        $manager->flush();
    }
}

<?php
declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $manager->persist(Product::create(
            'Headset',
            '5.1 Sounderlebnis',
            50.00,
            10,
            $this->getReference('electronic-category'),
            [$this->getReference('dresden-warehouse'), $this->getReference('leipzig-warehouse')]
        ));

        $manager->persist(Product::create(
            'Hemd',
            'Weisses Slim-Fit Hemd',
            30.00,
            22,
            $this->getReference('clothes-category'),
            [$this->getReference('dresden-warehouse'), $this->getReference('leipzig-warehouse')]
        ));

        $product = Product::create(
            'Blue Jeans',
            'Blue Jeans Klassiker',
            55.00,
            0,
            $this->getReference('clothes-category'),
            [$this->getReference('dresden-warehouse'), $this->getReference('leipzig-warehouse')]
        );

        $product->disable();

        $manager->persist($product);

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [CategoryFixtures::class, WarehouseFixtures::class];
    }
}
<?php
declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $electronic = Category::create('Elekronik', 'Elektronikartikel');
        $clothes = Category::create('Kleidung', 'Kleidungsstücke');

        $manager->persist($electronic);
        $manager->persist($clothes);
        $manager->flush();

        $this->addReference('electronic-category', $electronic);
        $this->addReference('clothes-category', $clothes);
    }
}
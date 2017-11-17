<?php
declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\Warehouse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class WarehouseFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $dresden = Warehouse::create('Dresden');
        $leipzig = Warehouse::create('Leipzig');

        $manager->persist($dresden);
        $manager->persist($leipzig);
        $manager->persist(Warehouse::create('Zittau'));
        $manager->flush();

        $this->addReference('dresden-warehouse', $dresden);
        $this->addReference('leipzig-warehouse', $leipzig);
    }
}
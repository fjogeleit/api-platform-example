<?php
declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $password = $this->container->get('security.password_encoder')->encodePassword(new User, 'phpdd_ug2017');

        $manager->persist(User::create('user@api-example.de', $password, $this->getReference('user-role')));
        $manager->persist(User::create('admin@api-example.de', $password, $this->getReference('admin-role')));

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [RoleFixtures::class];
    }
}
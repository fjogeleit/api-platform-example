<?php
declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\User\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = Role::create('ROLE_USER');
        $admin = Role::create('ROLE_ADMIN');

        $manager->persist($user);
        $manager->persist($admin);

        $manager->flush();

        $this->addReference('user-role', $user);
        $this->addReference('admin-role', $admin);
    }
}
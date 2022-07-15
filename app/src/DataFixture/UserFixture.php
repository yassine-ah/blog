<?php

namespace App\DataFixture;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends AbstractFixture
{

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword('admin');

        $manager->persist($user);
        $manager->flush();
    }
}
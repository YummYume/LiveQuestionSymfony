<?php

namespace App\DataFixtures;

use App\Entity\{Category, Profile,Role};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new Role();
        $admin->setContent("Admin");

        $profile = new Profile();
        $profile->setUsername("Lythis");
        $profile->setMail("owo@uwu.fr");
        $profile->setPassword("12345");
        $profile->setGender("Helicoptere de combat");
        $profile->setRole($admin);

        $cute = new Category();
        $cute->setContent("Cute");

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\{Category, Profile,Role, Question, Answer, Like, Friend};
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

        $profile2 = new Profile();
        $profile2->setUsername("YummYumm");
        $profile2->setMail("UwU@OwO.fr");
        $profile2->setPassword("12345");
        $profile2->setGender("Helicoptere de combat");
        $profile2->setRole($admin);

        $cute = new Category();
        $cute->setContent("Cute");

        $question = new Question();
        $question->setTitle("Salut, ça va ?");
        $question->setCategory($cute);
        $question->setProfile($profile);
        $question->setDate(new \DateTime('2020-04-17 05:54:58'));
        $question->setVisible(true);

        $answer = new Answer();
        $answer->setTitle("Oui ça va merci");
        $answer->setDate(new \DateTime('2020-04-17 07:57:59'));
        $answer->setQuestion($question);

        $like = new Like();
        $like->getQuestion($question);
        $like->getProfile($profile);

        $friend = new Friend();
        $friend->getProfileReceiver($profile);
        $friend->getProfileSender($profile2);

        $manager->persist($profile);    
        $manager->persist($cute);
        $manager->persist($question);
        $manager->flush();


    }
}

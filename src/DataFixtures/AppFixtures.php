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
        $user = new Role();
        $user->setContent("User");

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
        $profile2->setRole($user);

        $cute = new Category();
        $cute->setContent("Cute");

        $question = new Question();
        $question->setTitle("Salut, ça va ?");
        $question->setCategory($cute);
        $question->setProfile($profile);
        $question->setDate(new \DateTime('2020-04-17 05:54:58'));
        $question->setVisible(true);

        $answer = new Answer();
        $answer->setProfile($profile2);
        $answer->setTitle("Oui ça va merci");
        $answer->setDate(new \DateTime('2020-04-17 07:57:59'));
        $answer->setQuestion($question);

        $like = new Like();
        $like->setQuestion($question);
        $like->setProfile($profile);

        $friend = new Friend();
        $friend->setProfileReceiver($profile);
        $friend->setProfileSender($profile2);
        $friend->setRequestStatus(false);

        $manager->persist($cute);
        $manager->persist($user);
        $manager->persist($admin); 
        $manager->persist($profile);
        $manager->persist($profile2);
        $manager->persist($question);
        $manager->persist($answer);
        $manager->persist($like);
        $manager->persist($friend);
        $manager->flush();


    }
}

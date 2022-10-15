<?php

namespace App\DataFixtures;

use App\Entity\User\AgeRangeType;
use App\Entity\User\CategoryType;
use App\Entity\User\FrequencyType;
use App\Entity\User\ModalityType;
use App\Entity\User\TopicType;
use App\Entity\User\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    /**
     * @param UserPasswordHasherInterface $hasher
     */
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }


    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setName($faker->name);
            $user->setRoles([]);
            $user->setPassword($this->hasher->hashPassword($user, '12345'));
            $user->setIsVerified(true);
            $user->setAgeRange(array_rand(AgeRangeType::getConstants()));
            $user->setModality(array_rand(ModalityType::getConstants()));
            $user->setCategory(array_rand(CategoryType::getConstants()));
            $user->setBio($faker->text(128));
            $topics = TopicType::getConstants();
            shuffle($topics);
            $topics = array_slice($topics, rand(0,4), rand(0,4));
            $user->setWritingTopic($topics);
            $user->setReadingTopic($topics);
            $user->setFavoriteWriters($this->getRandomWriters());
            $user->setFrecuency(array_rand(FrequencyType::getConstants()));
            $user->setCountry('ES');
            $user->setLanguage('es');

            $user->setImageName('juegos-minion.jpg');

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getRandomWriters(int $count = 5)
    {
        //Top 10 selling Books 2022: https://www.npd.com/news/entertainment-top-10/2022/top-10-books/
        $authors = [
            'Colleen Hoover',
            'Stephen King',
            'Delia Owens',
            'Jennette McCurdy',
            'Taylor Jenkins Reid',
            'Nicholas Sparks',
            'James Clear',
            'Dr Seuss',
            'Dav Pilkey',
            'Paul White',
        ];
        shuffle($authors);
        return array_slice($authors, 0, $count);
    }
}

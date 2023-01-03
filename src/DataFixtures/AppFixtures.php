<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $book = new Book();

            $book->setTitle("Livre " . $i);
            $book->setAuthor($faker->firstName() . " " . $faker->lastName());
            $book->setContent($faker->realText());
            $book->setCreatedAt(new \DateTimeImmutable('now'));
            $book->setDescription($faker->realText(60));
            $book->setIsbn($faker->isbn10());

            $manager->persist($book);

            for ($j = 0; $j < 2; $j++) {
                $review = new Review();

                $review->setAuthor($faker->firstName() . " " . $faker->lastName());
                $review->setBody($faker->text());
                $review->setCreatedAt(new \DateTimeImmutable('now'));
                $review->setRating($faker->biasedNumberBetween(0, 10));
                $review->setBook($book);

                $manager->persist($review);
            }
        }

        $manager->flush();
    }
}

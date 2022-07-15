<?php

namespace App\DataFixture;

use App\Entity\Article;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixture extends AbstractFixture
{
    private \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $article = $this->getArticle();
            $manager->persist($article);

            $this->addReference(Article::class . '_' . $i, $article);
        }

        $manager->flush();
    }

    private function getArticle(): Article
    {

        $article = new Article();
        $article->setTitle($this->faker->sentence());
        $article->setCreatedAt($this->faker->dateTimeThisYear());
        $article->setContent($this->faker->paragraphs(random_int(5, 10), true));

        // Faker is using placeholder.com to get images too.
        $picture = $this->faker->imageUrl();
        $article->setPicture($picture);

        return $article;
    }
}
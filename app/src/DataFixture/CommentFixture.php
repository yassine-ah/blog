<?php

namespace App\DataFixture;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CommentFixture extends AbstractFixture
{
    private \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $manager->persist($this->getComment());
        }

        $manager->flush();
    }

    private function getComment(): Comment
    {
        $comment = new Comment();
        $comment->setName($this->faker->userName());
        $comment->setEmail($this->faker->email());
        $comment->setUrl($this->faker->url());
        $comment->setCreatedAt($this->faker->dateTimeThisYear());
        $comment->setMessage($this->faker->sentence());

        /* @var $article Article */
        $article = $this->getReference(Article::class . '_' . $this->faker->numberBetween(0, 9));
        $comment->setArticle($article);

        return $comment;
    }

    public function getDependencies(): array
    {
        return [
            ArticleFixture::class,
        ];
    }
}
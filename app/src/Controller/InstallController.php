<?php

namespace App\Controller;

use App\DataFixture\ArticleFixture;
use App\DataFixture\CommentFixture;
use App\DataFixture\UserFixture;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\Tools\SchemaTool;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Comment;

class InstallController extends BaseController
{

    public function index(ServerRequestInterface $request): ResponseInterface
    {

        // TODO: check if the installation wasn't executed before

        $this->loadSchema();
        $this->loadFixtures();

        $response = new Response();
        $response->getBody()->write('Installation is done');
        return $response;
    }

    private function loadSchema(): void
    {
        $entityManager = $this->getEntityManager();

        $tool = new SchemaTool($entityManager);
        $classes = array(
            $entityManager->getClassMetadata(User::class),
            $entityManager->getClassMetadata(Article::class),
            $entityManager->getClassMetadata(Comment::class)
        );

        $tool->createSchema($classes);
    }

    private function loadFixtures(): void
    {
        $entityManager = $this->getEntityManager();

        $loader = new Loader();
        $loader->addFixture(new UserFixture());
        $loader->addFixture(new ArticleFixture());
        $loader->addFixture(new CommentFixture());

        $executor = new ORMExecutor($entityManager, new ORMPurger());
        $executor->execute($loader->getFixtures(), append: true);
    }
}
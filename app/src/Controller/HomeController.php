<?php

namespace App\Controller;

use App\Entity\Article;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends BaseController
{

    public function index(ServerRequestInterface $request): ResponseInterface
    {

        // TODO: add author to the article
        // TODO: add pagination

        $em = $this->getEntityManager();
        $articles = $em->getRepository(Article::class)->findAll();

        $page = $this->getTwig()->render('home.html.twig', ['articles' => $articles]);

        $response = new Response();
        $response->getBody()->write($page);
        return $response;
    }

    public function preview(ServerRequestInterface $request, $args): ResponseInterface
    {

        $id = $args['id'];

        $em = $this->getEntityManager();
        $article = $em->getRepository(Article::class)->findOneById($id);
        $comments = $article->getComments();

        // TODO: group related template in directories
        $page = $this->getTwig()
            ->render('article_preview.html.twig', ['article' => $article, 'comments' => $comments]);

        $response = new Response();
        $response->getBody()->write($page);
        return $response;
    }

}
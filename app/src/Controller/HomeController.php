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

        $em = $this->getEntityManager();
        $articles = $em->getRepository(Article::class)->findAll();

        $page = $this->getTwig()->render('home.html.twig', ['articles' => $articles]);

        $response = new Response();
        $response->getBody()->write($page);
        return $response;
    }

}
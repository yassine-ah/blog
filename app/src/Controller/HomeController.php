<?php

namespace App\Controller;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends BaseController
{

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $page = $this->getTwig()->render('home.html.twig');

        $response = new Response();
        $response->getBody()->write($page);
        return $response;
    }

}
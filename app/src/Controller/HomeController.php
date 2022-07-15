<?php

namespace App\Controller;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends BaseController
{

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write('home page');
        return $response;
    }

}
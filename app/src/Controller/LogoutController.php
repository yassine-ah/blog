<?php

namespace App\Controller;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogoutController extends BaseController
{

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        session_unset();
        session_destroy();
        $_SESSION = array();

        return new Response\RedirectResponse('/');
    }
}
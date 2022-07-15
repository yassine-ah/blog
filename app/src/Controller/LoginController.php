<?php

namespace App\Controller;

use App\Entity\User;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends BaseController
{

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write('Installation is done');
        return $response;
    }

    /**
     * @throws \Exception
     */
    public function validate(ServerRequestInterface $request): ResponseInterface
    {

        // TODO: check if params exist
        $username = $request->getParsedBody()['username'];
        $password = $request->getParsedBody()['password'];

        $entityManager = $this->getEntityManager();
        /* @var $user \App\Entity\User */
        $user = $entityManager->getRepository(User::class)->findOneByUsername($username);

        // TODO: catch exception and have a uniform error object
        if (empty($user) || password_verify($password, $user->getPassword()) === FALSE) {
            // TODO: add an attempts field to count invalid tentatives and prevent brute forcing
            throw new \Exception('Invalid username or Password');
        }

        session_start();
        session_regenerate_id(true);
        $_SESSION['user'] = $user;

        return new Response\RedirectResponse('/');
    }

}
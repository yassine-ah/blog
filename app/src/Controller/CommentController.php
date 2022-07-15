<?php

namespace App\Controller;

use App\Entity\Comment;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CommentController extends BaseController
{
    public function delete(ServerRequestInterface $request, $args): ResponseInterface
    {

        $id = $args['id'];

        $em = $this->getEntityManager();
        $comment = $em->getRepository(Comment::class)->findOneById($id);

        $em->remove($comment);
        $em->flush();

        $response = new Response();
        $response->getBody()->write('OK');
        return $response;
    }
}
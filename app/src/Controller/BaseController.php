<?php

namespace App\Controller;

use App\Singleton\EntityManager;
use App\Singleton\Twig;
use Twig\Environment;

class BaseController
{

    private $entityManager;
    private $twig;

    public function __construct()
    {
        $this->entityManager = EntityManager::getInstance()->get();
        $this->twig = Twig::getInstance()->get();
    }

    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    protected function getTwig(): Environment
    {
        return $this->twig;
    }

}
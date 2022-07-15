<?php

namespace App\Controller;

use App\Singleton\EntityManager;

class BaseController
{

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManager::getInstance()->get();
    }

    protected function getEntityManager()
    {
        return $this->entityManager;
    }

}
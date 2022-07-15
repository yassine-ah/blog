<?php

namespace App\Singleton;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager AS DoctrineEntityManager;

class EntityManager extends Singleton
{
    private DoctrineEntityManager $entityManager;

    // The configuration should be stored outside git tracked files, by using .env file for example (security reason)
    protected function __construct()
    {
        $paths = array(BASE_PATH . "/src/Entity");

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'host'     => 'database',
            'user'     => 'check24_usr',
            'password' => 'check24_pwd',
            'dbname'   => 'check24_db',
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, true, null, null, false);
        $this->entityManager = DoctrineEntityManager::create($dbParams, $config);

        parent::__construct();
    }

    public static function get(): DoctrineEntityManager
    {
        return self::getInstance()->entityManager;
    }
}
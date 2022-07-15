<?php

namespace App\Singleton;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig extends Singleton
{
    private Environment $twig;

    // The configuration should be stored outside git tracked files, by using .env file for example (security reason)
    protected function __construct()
    {
        $loader = new FilesystemLoader(BASE_PATH . '/src/Template');
        $this->twig = new Environment($loader);

        parent::__construct();
    }

    public static function get()
    {
        return self::getInstance()->twig;
    }
}
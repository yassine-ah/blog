<?php

namespace App\Controller;

class LogoutController extends BaseController
{

    public function index()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();

        header("Location: /");
    }
}
<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 2/7/2021
 */

namespace app\controllers;

use app\core\AssetManager;
use app\core\Controller;

class AuthController extends Controller
{


    public function Login()
    {

        if ($this->Request->isPost()) {
            return "handling data";
        }
        return $this->Render("login", "Login Page");
    }

    public function Register()
    {
        return $this->Render("Register", "Registration Page");
    }

}
<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 2/7/2021
 */

namespace app\controllers;

use app\core\Application;
use app\core\AssetManager;
use app\core\Controller;
use app\models\User;

class AuthController extends Controller
{


    public function Login()
    {
        return $this->Render("login", "Login Page");
    }

    public function Register()
    {
        $user = new User();

        if ($this->Request->isPost()) {
            $user->loadData($this->Request->getBody());


            if ($user->validate() && $user->save()) {

                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->Response->redirect('/');
            }

            return $this->Render("Register", "Registration Page", [
                'model' => $user
            ]);


        }
        return $this->Render("Register", "Registration Page", [
            'model' => $user
        ]);
    }

}
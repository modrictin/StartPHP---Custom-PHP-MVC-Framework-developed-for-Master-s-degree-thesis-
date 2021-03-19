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
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!Application::$app::isGuest()) {
            Application::$app->Response->redirect('/');
        }
    }

    public function Login()
    {

        $loginForm = new LoginForm();

        if ($this->Request->isPost()) {

            $loginForm->loadData($this->Request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->Response->redirect('/');
            }
        }

        return $this->Render("login", "Login Page", [
            'model' => $loginForm,

        ]);
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

            return $this->Render("register", "Registration Page", [
                'model' => $user
            ]);


        }
        return $this->Render("register", "Registration Page", [
            'model' => $user
        ]);
    }

    public function Logout()
    {
        Application::$app->logout();
        Application::$app->Response->Redirect('/login');
    }


}
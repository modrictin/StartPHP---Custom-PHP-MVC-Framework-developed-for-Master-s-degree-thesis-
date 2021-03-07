<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 2/7/2021
 */

namespace app\controllers;

use app\core\AssetManager;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{


    public function Login()
    {
        return $this->Render("login", "Login Page");
    }

    public function Register()
    {
        $registerModel = new RegisterModel();

        if ($this->Request->isPost()) {
            $registerModel->loadData($this->Request->getBody());


            if ($registerModel->validate() && $registerModel->register()) {

                return 'success';
            }

            return $this->Render("Register", "Registration Page", [
                'model' => $registerModel
            ]);


        }
        return $this->Render("Register", "Registration Page", [
            'model' => $registerModel
        ]);
    }

}
<?php

namespace app\core\middlewares;

use app\core\Application;
use app\core\exceptions\ForbiddenException;

/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/19/2021
 */
class Auth
{

    public static function checkLogin()
    {
        if (Application::$app::isGuest()) {
            throw new ForbiddenException();
        }
    }

}
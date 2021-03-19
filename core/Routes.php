<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\core;

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\exceptions\ForbiddenException;
use app\core\middlewares\Auth;
use app\core\Response;
use app\core\Request;

use Phroute\Phroute\RouteCollector;

class Routes
{
    static function DefineFilters(RouteCollector $router)
    {
        $router->filter('auth', function () {

            Auth::checkLogin();

        });
    }


    static function DefineRouts(RouteCollector $router)
    {
        self::DefineFilters($router);


        $router->group(['before' => 'auth'], function ($router) {
            $router->get('/', [SiteController::class, "Home"],);
            $router->get('/profile', [AuthController::class, 'Profile']);
            $router->get('/contact', [SiteController::class, 'Contact']);
            $router->post('/contact', [SiteController::class, 'handleContact']);
        });

        $router->post('/login', [AuthController::class, 'Login']);
        $router->get('/login', [AuthController::class, 'Login']);

        $router->get('/register', [AuthController::class, 'Register']);
        $router->post('/register', [AuthController::class, 'Register']);
        $router->get('/logout', [AuthController::class, 'Logout']);

    }
}
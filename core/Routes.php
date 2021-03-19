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
        $router->filter('firstRedirect', function () {
            if (Application::$app::isGuest()) {
                Application::$app->Response->Redirect('/login');
            }
        });
    }


    static function DefineRouts(RouteCollector $router)
    {
        self::DefineFilters($router);

        $router->group(['before' => 'firstRedirect'], function ($router) {
            $router->get('/', [SiteController::class, "Home"],);
        });


        $router->group(['before' => 'auth'], function ($router) {
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
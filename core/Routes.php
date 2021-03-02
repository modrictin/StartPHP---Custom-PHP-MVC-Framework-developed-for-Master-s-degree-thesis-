<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\core;

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Response;
use app\core\Request;
use Phroute\Phroute\RouteCollector;

class Routes
{
    static function DefineRouts(RouteCollector $router)
    {
        $router->get('/', [SiteController::class, "Home"]);
        $router->get('/contact', [SiteController::class, "Contact"]);
        $router->post('/contact', [SiteController::class, "HandleContact"]);

        $router->get('/login', [AuthController::class, 'Login']);
        $router->post('/login', [AuthController::class, 'Login']);
        $router->get('/register', [AuthController::class, 'Register']);
        $router->post('/register', [AuthController::class, 'Register']);

    }
}
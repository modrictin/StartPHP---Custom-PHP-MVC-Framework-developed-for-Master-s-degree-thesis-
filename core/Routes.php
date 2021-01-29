<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\core;

use app\controllers\SiteController;
use Phroute\Phroute\RouteCollector;


class Routes
{
    static function DefineRouts(RouteCollector $router)
    {
        $router->get('/', [SiteController::class, "home"]);


    }
}
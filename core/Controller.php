<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/29/2021
 */

namespace app\core;

use app\core\middlewares\BaseMiddleware;
use League\Plates\Engine;

class Controller
{
    public Request $Request;
    public string $action = '';
    public Response $Response;


    public function __construct()
    {
        $this->Request = Application::$app->Request;
        $this->Response = Application::$app->Response;

    }


    public function Render($view, $title, $params = [], $packages = [])
    {
        $templates = new Engine(Application::$ROOT_DIR . '/views');

        $templates->addData(['GlobalViewName' => $view]);
        $templates->addData(['GlobalPageTitle' => $title]);
        $templates->addData(['GlobalPackages' => AssetManager::IncludePackages($packages)]);

        return $templates->render($view, $params);
    }

}
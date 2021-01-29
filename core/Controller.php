<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/29/2021
 */

namespace app\core;

use League\Plates\Engine;

class Controller
{

    public function Render($view, $params = [])
    {

        $templates = new Engine(Application::$ROOT_DIR . '/views');

        return $templates->render($view, $params);

    }

}
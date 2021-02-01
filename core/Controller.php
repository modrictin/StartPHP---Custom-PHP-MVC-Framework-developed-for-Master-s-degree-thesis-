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


    /**
     * @param array $packages -> When passing this parameter please call the static function from
     * AssetManage.php Class. Pass that function all the packages you defined
     * in the same class packages array
     */

    public function Render($view, $title, $params = [], $packages = [])
    {
        $templates = new Engine(Application::$ROOT_DIR . '/views');
        $params['VIEW_NAME'] = $view;
        $params['PAGE_TITLE'] = $title;
        $params['PACKAGES'] = $packages;

        return $templates->render($view, $params);
    }

}
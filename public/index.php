<?php

/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/27/2021
 */

require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;
$app = new Application(dirname(__DIR__));

$app->Run();
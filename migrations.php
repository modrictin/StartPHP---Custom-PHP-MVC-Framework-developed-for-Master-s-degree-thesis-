<?php

/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/27/2021
 */

/**
 * Public folder is added to run index.php
 * so users cant access our files from the url
 * for example if someone types /composer.json
 * He can read it
 * This Way he cant
 * Tin
 */
require_once __DIR__ . "/vendor/autoload.php";

use app\core\Application;

$app = new Application(__DIR__);


$app->db->applyMigrations();

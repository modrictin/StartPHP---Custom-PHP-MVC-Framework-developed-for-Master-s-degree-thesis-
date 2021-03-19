<?php
/**
 * User: TheCodeholic
 * Date: 7/10/2020
 * Time: 8:21 AM
 */

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';


$app = new Application(__DIR__);

$app->db->applyMigrations();
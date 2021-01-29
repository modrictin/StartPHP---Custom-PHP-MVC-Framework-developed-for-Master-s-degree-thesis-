<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use League\Plates\Engine;

class SiteController extends Controller
{


    public function home()
    {

        return $this->Render('home', ['name' => 'tin']);

    }
}
<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\controllers;


use app\core\AssetManager;
use app\core\Controller;


class SiteController extends Controller
{


    public function Home()
    {
        return $this->Render('home', "Dashboard", ['name' => array("asd")], AssetManager::IncludePackages(['tester']));
    }

    public function Contact()
    {
        return $this->Render("contact", "Contact Support");
    }

    public function HandleContact()
    {


        var_dump($this->Request->GetBody());

    }
}
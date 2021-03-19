<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\controllers;


use app\core\Application;
use app\core\AssetManager;
use app\core\Controller;
use app\models\ContactForm;
use app\models\User;


class SiteController extends Controller
{

    public function Home()
    {
        return $this->Render('home', "Dashboard", [], ['tester']);
    }

    public function Contact()
    {
        $contact = new ContactForm();
        return $this->Render("contact", "Contact Support", ['model' => $contact]);

    }

    public function handleContact()
    {
        $contact = new ContactForm();
        $contact->loadData($this->Request->GetBody());
        if ($contact->validate() && $contact->send()) {
            Application::$app->session->setFlash('success', 'Thanks for contacting support');
            $this->Response->Redirect('/contact');
        }
        return $this->Render("contact", "Contact Us", ['model' => $contact]);

    }

}
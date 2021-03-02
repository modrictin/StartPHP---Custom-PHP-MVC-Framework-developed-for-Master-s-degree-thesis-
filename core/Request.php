<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/29/2021
 */

namespace app\core;


class Request
{
    public function GetUrl()
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    public function GetBody()
    {
        $data = [];
        if ($this->IsGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->IsPost()) {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }

    public function IsGet()
    {
        return $this->getMethod() === 'get';
    }

    public function GetMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function IsPost()
    {
        return $this->getMethod() === 'post';
    }
}
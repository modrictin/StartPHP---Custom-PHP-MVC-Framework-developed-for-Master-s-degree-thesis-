<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/29/2021
 */

namespace app\core;


class Response
{
    public function StatusCode(int $code)
    {
        http_response_code($code);
    }

    public function Redirect($url)
    {
        header("Location: $url");
    }
}
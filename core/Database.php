<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/15/2021
 */

namespace app\core;


class Database
{
    public \PDO $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
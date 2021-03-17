<?php

use app\core\Application;

/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/15/2021
 */
class m001_init
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                password VARCHAR(512) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE users;";
        $db->pdo->exec($sql);
    }
}
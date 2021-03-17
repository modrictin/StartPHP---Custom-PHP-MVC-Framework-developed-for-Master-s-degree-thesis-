<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/17/2021
 */

namespace app\core;


abstract class DbModel extends Model
{

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $stmt = self::prepare("INSERT INTO $tableName 
                                (" . implode(',', $attributes) . ") 
                                VALUES 
                                (" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }

        $stmt->execute();
        return true;
    }

    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);

    }
}
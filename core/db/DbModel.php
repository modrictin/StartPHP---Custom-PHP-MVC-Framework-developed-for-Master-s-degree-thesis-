<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/17/2021
 */

namespace app\core\db;


use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    abstract public static function primaryKey(): string;


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

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $imploded = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $imploded");
        foreach ($where as $attr => $val) {
            $stmt->bindValue(":$attr", $val);
        }
        $stmt->execute();
        return $stmt->fetchObject(static::class);

    }
}
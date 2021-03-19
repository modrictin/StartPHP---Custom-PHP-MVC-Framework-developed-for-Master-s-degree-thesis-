<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/9/2021
 */

namespace app\core\form;


use app\core\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute, $type = Field::TYPE_TEXT)
    {
        return new Field($model, $attribute, $type);
    }


}
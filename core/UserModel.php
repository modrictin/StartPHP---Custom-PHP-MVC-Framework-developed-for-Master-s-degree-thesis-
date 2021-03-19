<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/19/2021
 */

namespace app\core;


abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/19/2021
 */

namespace app\core\exceptions;


class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = 'No permission for this page';
}
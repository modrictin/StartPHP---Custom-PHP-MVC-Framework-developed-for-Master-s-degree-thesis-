<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/9/2021
 */

namespace app\core\form;


/**
 * Class TextareaField
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\phpmvc\form
 */
class TextareaField extends BaseField
{
    public function renderInput()
    {
        return sprintf('<textarea class="form-control %s" rows="7" name="%s">%s</textarea>',
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}
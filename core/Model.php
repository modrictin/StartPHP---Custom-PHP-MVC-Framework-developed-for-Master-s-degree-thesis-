<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/6/2021
 */

namespace app\core;

use Respect\Validation\Validator as v;

//ABSTRACT TO AVOID CREATING OBJECT
abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {

        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                switch ($ruleName) {
                    case self::RULE_REQUIRED:
                        if (!v::notEmpty()->validate($value)) {
                            $this->addError($attribute, $ruleName);
                        }
                        break;
                    case self::RULE_EMAIL:
                        if (!v::notEmpty()->email()->validate($value)) {
                            $this->addError($attribute, $ruleName);
                        }
                        break;
                    case self::RULE_MIN:
                        if (!v::stringType()->length($rule['min'])->validate($value)) {
                            $this->addError($attribute, $ruleName, $rule);
                        }
                        break;
                    case self::RULE_MAX:
                        if (!v::stringType()->length(null, $rule['max'])->validate($value)) {
                            $this->addError($attribute, $ruleName, $rule);
                        }
                        break;
                    case self::RULE_MATCH:
                        if (!v::stringType()->equals($this->{$rule['match']})->validate($value)) {
                            $this->addError($attribute, $ruleName, $rule);

                        }
                        break;


                }
            }
        }

        return empty($this->errors);
    }

    abstract public function rules(): array;

    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be a valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
        ];
    }


    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }

}
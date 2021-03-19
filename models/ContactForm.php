<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/19/2021
 */

namespace app\models;


use app\core\Application;
use app\core\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED],

        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Mail Subject',
            'email' => 'Your Email',
            'body' => 'Mail Body',

        ];
    }

    public function send()
    {
        Application::$app->mailer->send_mail($this->subject, $this->body, [$this->email]);
        return true;
    }
}
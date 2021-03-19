<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/19/2021
 */

namespace app\core;


use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{


    private PHPMailer $mailer;
    private $config;

    public function __construct($cfg)
    {
        $this->mailer = new PHPMailer(true);
        $this->config = $cfg;

        $this->initializeSettings();
    }


    private function initializeSettings()
    {


        $this->mailer->isSMTP();
        $this->mailer->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mailer->SMTPAuth = true;


        $this->mailer->Host = $this->config['mail_host'];                     //Set the SMTP server to send through
        $this->mailer->Port = $this->config['smtp_port'];


        $this->mailer->Username = $this->config['mail_username'];                     //SMTP username
        $this->mailer->Password = $this->config['mail_pw'];                               //SMTP password
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

        $this->mailer->setFrom($this->config['from_default']);


    }


    public function send_mail(string $subject, string $body, array $addresses, $from = '', $replyTo = '')
    {

        try {

            foreach ($addresses as $address) {
                $this->mailer->addAddress($address);
            }
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();
        } catch (Exception $e) {
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
            return false;
        }
    }


}
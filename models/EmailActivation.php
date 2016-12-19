<?php

defined('_JEXEC') or die('Restricted access');

class EmailActivation
{

    const VERIFY_URL = '/user/verify';

    public static function generateVerifyString()
    {
        $verify_string = '';
        for($i = 0; $i < 16; $i++)
        {
            $verify_string .= chr(mt_rand(32, 126));
        }
        return $verify_string;
    }

    public static function sendEmail($email, $verify_string)
    {
        $verify_string = urlencode($verify_string);
        $safe_email = urlencode($email);
        $headers = 'Content-type: text/html; charset=windows-1251 \r\n';

        $url = SITE_URL.self::VERIFY_URL;
        $mail_body = <<<_MAIL
          For: $email:
          For activation account click <a href="$url?email=$safe_email&verify_string=$verify_string">$url?email=$safe_email&verify_string=$verify_string</a>
               <br /> =============== <br /> 
          Для $email:
          Пожалуйста, перейдите по следующей ссылке для активации вашего аккаунта:
          <a href="$url?email=$safe_email&verify_string=$verify_string">$url?email=$safe_email&verify_string=$verify_string</a>
          Ссылка работает 7 дней, если не подтвердить аккаунт в течение этого времени, он будет удалён.
_MAIL;

        $mail_body = iconv('utf-8', 'windows-1251', $mail_body);
        mail($email, "Account activation - ".SITE_NAME, $mail_body, $headers);
    }

    public static function sendMessage($topic, $email, $message, $username)
    {
        $message = "From cabinet/support. From $username (answer to $email): $message";
        $headers = 'Content-type: text/html; charset=windows-1251 \r\n';
        
        $topic = iconv('utf-8', 'windows-1251', $topic);
        //$email = urlencode($email);
        $message = iconv('utf-8', 'windows-1251', $message);
        
        return mail(ADMIN_EMAIL, $topic, $message, $headers);
    }
}

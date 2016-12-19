<?php

class SigninForm
{
    public static function validateInput($username, $password)
    {
        $errors = array();
        if(!User::checkDataForLogin($email, $password))
        {
            $errors[] = 'Неверные данные для входа';
        }
        if(!empty($errors))
        {
            return $errors;
        }
        return false;
    }
}
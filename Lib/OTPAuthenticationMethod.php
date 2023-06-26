<?php

include_once './Lib/AuthenticationMethod.php';
include_once './model/OTP.php';

class OTPAuthenticationMethod extends AuthenticationMethod
{
    public static function login() {
        if (OTP::checkCredentials($_POST['user_id'], $_POST['code']) !== false) {
            return self::authenticate($_POST['user_id']);
        }
        return false;
    }
}
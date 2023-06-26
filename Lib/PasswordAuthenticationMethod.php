<?php

include_once './Lib/AuthenticationMethod.php';
include_once './model/Passwords.php';

class PasswordAuthenticationMethod extends AuthenticationMethod
{
    public static function login() {
        $user = Passwords::checkCredentials($_POST['email'], $_POST['password']);
        return $user ? self::authenticate($user) : false;
    }
}
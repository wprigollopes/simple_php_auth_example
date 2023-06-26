<?php

class AuthenticationController {
    public static function authenticate($type) {
        switch ($type) {
            case 'OTP':
                include_once './Lib/OTPAuthenticationMethod.php';
                if (OTPAuthenticationMethod::login()) {
                    Render::renderView('checkLogin');
                    return;
                }
                Render::renderView('loginFail');
                break;
            case 'password':
                include_once './Lib/PasswordAuthenticationMethod.php';
                if (PasswordAuthenticationMethod::login()) {
                    Render::renderView('checkLogin');
                    return;
                }
                Render::renderView('loginFail');
                break;
        }
    }

    public static function logout()
    {
        include_once './Lib/AuthenticationMethod.php';
        AuthenticationMethod::logout();
    }
}
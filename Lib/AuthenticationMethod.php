<?php

abstract class AuthenticationMethod {
    abstract public static function login();

    // For the example, using session
    // We also can use cookies
    public static function logout() {
        session_destroy();
    }

    // We can create some hashing structure to encrypt cookie data
    public static function authenticate($user) {
        // Check if we are already logged in
        // Set the cookie, or db, etc
        session_start();
        if ($_SESSION['user_id']) {
            echo "Already logged in";
            return false;
        }
        $_SESSION['user_id'] = $user;
        $_SESSION['time'] = time()+6000;
        
        return true;
    }
}
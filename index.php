<?php

include_once 'Render.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

session_start();

//
// This will work like a routing file, analyze the url and return the logic if exists
//
if ($method == 'POST') {
    switch ($uri) {
        // For this example, two different logins are used:
        // 1. Login using OTP
        case '/login/otp':
            include_once './controllers/AuthenticationController.php';
            AuthenticationController::authenticate('OTP');
            return;
        // 2. Login using password
        case '/login/password':
            include_once './controllers/AuthenticationController.php';
            AuthenticationController::authenticate('password');
            return;
    }
}

if ($method == 'GET') {
    switch($uri) {
        case '/':
            Render::renderView('default');
            return;
        // To test if login is checked
        case '/checklogin':
            Render::renderView('checkLogin');
            return;
        case '/logout':
            include_once './controllers/AuthenticationController.php';
            AuthenticationController::logout();
            Render::renderView('logout');
            return;
    }
}
return Render::renderView('404');
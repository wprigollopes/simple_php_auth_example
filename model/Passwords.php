<?php

include_once './model/User.php';

class Passwords
{
    public static function getUsers() {
        return [
            [
                'user_id' => 1,
                'password' => 'thisismypassword'
            ]
        ];
    }

    public static function checkCredentials(string $email, string $password) {
        $user = User::getUserByEmail($email);
        $key = array_search($user['id'], array_column(self::getUsers(), 'user_id'));
        $credentials = self::getUsers()[$key];
        $user_id = ($key !== false && $credentials['password'] == $password) ? $credentials['user_id'] : false;
        return $user_id;
    }
}
<?php

class User
{
    private static $user = [
        'id' => 1,
        'email' => 'john@doe.com',
        'name' => 'John',
        'lastName' => 'Doe',
        'birthDate' => ''
    ];

    protected int $id;
    protected string $email;
    protected string $name;
    protected string $lastName;
    protected string $birthDate;
 
    public static function getUser() {
        return self::$user;
    }

    // Simplified model with 1 user
    public static function getUserByEmail($email) {
        return $email == self::$user['email'] ? self::$user : false;
    }
}

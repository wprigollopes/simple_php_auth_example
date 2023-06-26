<?php

include_once './model/User.php';

class OTP {
   
    /**
     * Simulate a OTPCodes table results
     * This will be an inner join between users table and otp table
     */
    private static function getOTPCodes() {
        return [
            [
                'user_id' => 1,
                'user' => User::getUser(),
                'code' => '1234',
                'expires_at' => microtime()+1000
            ]
        ];
    }

    public static function checkCredentials($user_id, $code) {
        $users = self::getOTPCodes();
        $key = array_search($user_id, array_column($users, 'user_id'));
        return ($key !== false && $users[$key]['code'] == $code) ? $users['key'] : false;
    }
}
<?php

/**
 * El controllador del home
 *
 * @author gaston
 */

require_once('./model/UserRepository.php');

class Validator {
        
    private static function pepper($password){
        return hash("sha256",hash("md5",$password).hash("md5","spicydeliciouspepper"));
    }

    private static function startSession(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public static function auth($username, $password){
        $pepper = self::pepper($password);
        $salt = UserRepository::getInstance()->salt($username);
        $hashedPassword = hash("sha256",$password . $salt . $pepper);
        return UserRepository::getInstance()->auth($username, $hashedPassword);
    }

    public static function userLogin($username){
        self::startSession();
        $_SESSION['username'] = $username;
    }

    public static function logout(){
        self::startSession();
        $_SESSION = [];
    }

    public static function dataArray(){
        self::startSession();
        return ['logued' => self::userLogued()];
    }

    public static function userLogued(){
        self::startSession();
        if(isset($_SESSION['username'])){
            return $_SESSION['username'];
        }else{            
            return false;
        }
    }
}
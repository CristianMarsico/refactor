<?php
class AuthHelper
{
    public static function start()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }
    /*
    Barrera de seguridad
    */
    public static function checklogged()
    {
        self::start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . 'showForm');
            die();
        }
    }
    static public function session() {
        self::start(); 
        return (isset($_SESSION['IS_LOGGED']));
    }

    public static function login($user)
    {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['PRIORITY'] = $user->priority;
        $_SESSION['ID_USER'] = $user->id_user;
        $_SESSION['USERNAME'] = $user->username;
    }

    public static function getUserName()
    {
        self::start();
        if (isset($_SESSION['USERNAME']))
            return $_SESSION['USERNAME'];
    }

    public static function getUserPriority()
    {
        self::start();
            if(isset($_SESSION['IS_LOGGED'])){
                return ($_SESSION['PRIORITY']);
            }
    }

    public static function destroy()
    {
        session_start();
        session_destroy();
        header('location: ' . BASE_URL . 'showForm');
    }

    public static function idUser()
    {
        self::start();
        if (isset($_SESSION['USERNAME'])) {
            return $_SESSION['ID_USER'];
        }
        return false;
    }
}

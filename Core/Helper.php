<?php


namespace Core;


use App\Config;

class Helper
{
    public static function debugPR($array, $die = false)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';

        if ($die) die;
    }
    public static function debugVD($array, $die = false)
    {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';

        if ($die) die;
    }

    /**
     * Redirect to a different page
     */
    public static function redirect($url)
    {
        header('Location: ' . Config::PROTOKOL . $_SERVER['HTTP_HOST'] . $url, true, 303);
        exit;
    }
    public static function security($data)
    {
        return trim(strip_tags($data));
    }
    public static function createSession($sessionName, $sessionValue)
    {
        $_SESSION[$sessionName] = $sessionValue;
    }
}
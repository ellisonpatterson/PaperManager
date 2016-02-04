<?php

class Session
{
	/*
	 * Global Variables
	*/
    private static $_instance;

    /*
     * Get's an instance of the class.
     * Using Singleton
    */
    public static function getInstance()
    {
        if (!self::$_instance)
        {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function logSession(array $data)
    {
        foreach ($data as $key => $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    public function destroySession()
    {
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        session_regenerate_id(true);
    }

    public function getAllSessionValues()
    {
        return $_SESSION;
    }

    public function getSessionValue($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;;
    }

    public function setSessionValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}
<?php

class Database
{
	/*
	 * Global Variables
	*/
    private static $_instance;
    private $_db;

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

    /*
     * Constructor
    */
    public function __construct()
    {
		global $config;

		$this->_db = new PDO('mysql:host=' . $config['mysql']['hostname'] . ';dbname=' . $config['mysql']['database'] . ';charset=utf8', $config['mysql']['username'], $config['mysql']['password']);
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /*
     * Get's the Database object
    */
    public function getDb()
    {
        return $this->_db;
    }
}
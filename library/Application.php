<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
 * Include Configuration File
*/
require_once 'config.php';

class Application
{
	/*
	 * Global Variables
	*/
	protected static $db = null;
	protected static $session = null;

	/*
	 * Constructor
	*/
	public function __construct()
	{
		session_start();

		spl_autoload_register(array($this, 'autoLoader'));

		$this->route();
	}

	/*
	 * AutoLoader
	*/
	private function autoLoader($className) 
	{
		$fileName = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		$file = dirname(__FILE__) . '/' . $fileName;

		if (!file_exists($file))
		{
			return false;
		}

		require_once $file;
	}

	/*
	 * Chooses where the user-defined action will go
	*/
	public function route()
	{
		$params = array();

		$route = (empty($_GET)) ? array('index' => '') : $_GET;
		$route = explode('/', filter_var(key($route), FILTER_SANITIZE_URL));

		$controller = 'Controller_' . ucwords(isset($route[0]) ? ucwords($route[0]) : 'Index');

		$action = 'action';
		for ($i = 1; $i < count($route); $i++)
		{
			$action .= isset($route[$i]) ? ucwords($route[$i]) : 'Index';
		}

		// Just incase GET parameters do anything funky, this fixes it right up.
		$action = explode('&', $action);
		$action = array_shift($action);

		if ($action == 'action')
		{
			$action .= 'Index';
		}

		if (class_exists($controller) && method_exists($controller, $action))
		{
			call_user_func(array(new $controller(), $action));
			exit();
		}

		call_user_func(array(new Controller_Error, 'actionIndex'));
		exit();
	}

	/*
	 * Allows you to get the Session instance.
	 * If it doesn't exist, create it.
	*/
	public function getSession()
	{
		if ($this->session === null)
		{
			$this->session = new Session();
		}

		return $this->session;
	}
}
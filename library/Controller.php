<?php

class Controller 
{
	/*
	 * Global Variables
	*/
	protected $controller = null;
	protected $view = null;

	/*
	 * Constructor
	*/
	public function __construct()
	{
		$this->controller = ucwords(__CLASS__);

		$this->view = new View();
	}

	/*
	 * Checks if request is a POST.
	 * For Form Management.
	*/
	public function requestPostOnly()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST')
		{
			echo 'This page requires a POST request. Request not completed.';
			exit();
		}
	}

	/*
	 * Redirect the Controller while keeping URL structure
	*/
	public function redirectController($controller, $action = null)
	{
		if (is_object($controller))
		{
			$controller = get_class($controller);
		}

		$response = new $controller();

		if (is_null($action))
		{
			return $response->actionIndex();
		}

		return $response->$action();
	}

    /*
     * Rebuilds the URL based on the chosen Controller and action.
    */
    public function redirectRoute($controller, $action = null, $params = null)
    {
    	if ($controller == 'Controller_Index')
    	{
    		if ($action == 'actionIndex' || is_null($action))
    		{
    			return header('Location: ' . Helper_Route::loadRoute());
    		}
    	}

		$controller = explode('_', strtolower($controller));
		$action = preg_split('/(?=[A-Z])/', $action);

		$route = Helper_Route::loadRoute($controller[1]);

		if (!empty($action))
		{
			for ($i = 1; $i < count($action); $i++)
			{
				if ($action[$i] != 'Index')
				{
					$route .= '/' . strtolower($action[$i]);
				}
			}
		}

		return header('Location: ' . $route . $params);
	}
}
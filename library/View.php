<?php

class View
{
	/*
	 * Global Variables
	*/
	protected $controllerData = array();

	/*
	 * Constructor
	*/
	public function __construct()
	{
		$this->setData('user', Session::getInstance()->getAllSessionValues());
	}

	/*
	 * Accessors
	*/
	public function getData($key)
	{
		return $this->controllerData[$key];
	}

	/*
	 * Mutators
	*/
	public function setData($key, $value)
	{
		$this->controllerData[$key] = $value;
	}

	/*
	 * Load another PHP view
	*/
	public function loadFile($file)
	{
		$this->output($file);
	}

	/*
	 * Render View
	*/
	public function render($view)
	{
		if (!file_exists($view))
		{
			echo "View " . $view . " doesn't exist.";
			exit();
		}

		$this->output($view);
	}

	/*
	 * Output View
	*/
	private function output($file)
	{
		extract($this->controllerData);

		ob_start();
		include_once($file);
		$output = ob_get_contents();
		ob_end_clean();

		echo $output;
	}
}
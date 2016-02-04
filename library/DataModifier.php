<?php

class DataModifier
{
	/*
	 * Global Variables
	*/
	protected $_db = null;

	/*
	 * Get the DB instance from the Database class
	*/
	protected function _getDb()
	{
		if ($this->_db === null)
		{
			$database = Database::getInstance();
			$this->_db = $database->getDb();
		}

		return $this->_db;
	}
}
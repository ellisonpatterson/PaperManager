<?php

class Model
{
	protected $_db = null;

	/*
	 * Selects a single result.
	*/
	public function selectSingle($query)
	{
		$query = $this->select($query);

		return reset($query);
	}

	/*
	 * Selects multiple results.
	*/
	public function selectAll($query)
	{
		return $this->select($query);
	}

    /*
	* Select data from MySQL server and store
	* it in an array.
    */
	private function select($query)
	{
		$sorted = array();
		$results = $this->_getDb()->query($query);

		$sorted = array();
		while ($row = $results->fetch(PDO::FETCH_ASSOC))
		{
			$sorted[] = $row;
		}

		return $sorted;
	}

    /*
	 * Escape any inputted values for the queries.
    */
	public function quote($value)
	{
		return $this->_getDb()->quote($value);
	}

	/*
	 * Parses sql conditions when dyanamic fetching is implemented.
	*/
	public function getConditions(array $conditions)
	{
		if ($conditions)
		{
			return '(' . implode(') AND (', $conditions) . ')';
		}
		else
		{
			return '1=1';
		}
	}

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
<?php

class Model_Paper extends Model
{
	/*
     * Gets all available papers.
    */
    public function getAllPapers()
    {
        return $this->selectAll('SELECT * FROM `papers`');
    }

	/*
	 * Get's highest id index.
	*/
    public function getHighestId()
    {
    	$query = $this->selectSingle('SELECT MAX(`id`) FROM `papers`');

		return reset($query);
    }

    /*
    * Allows for dynamic fetching of content from
    * paper-related tables.
    */
    public function getPapers(array $fetchOptions = array())
    {
		$joinOptions = $this->preparePaperFetchOptions($fetchOptions);
		$groupOptions = $this->preparePaperGroupOptions($fetchOptions);
		$whereConditions = $this->preparePaperConditions($fetchOptions);

		return $this->selectAll('
			SELECT papers.*' . 
				$joinOptions['selectFields'] . '
			FROM papers AS papers
			' . $joinOptions['joinTables'] . '
			WHERE ' . $whereConditions . '
			' . $groupOptions . '
		');
    }

    /*
     * Chooses fetch options.
    */
    private function preparePaperFetchOptions(array $fetchOptions)
    {
		$selectFields = '';
		$joinTables = '';

		if (!empty($fetchOptions['join']) && $fetchOptions['join'])
		{
			if (in_array('authorship', $fetchOptions['join']))
			{
				$selectFields .= ',
					authorship.*';
				$joinTables .= '
					LEFT JOIN `authorship` ON
						(`papers`.id = `authorship`.paperId)';
			}

			if (in_array('keywords', $fetchOptions['join']))
			{
				$selectFields .= ',
					paper_keywords.id AS keywordId, paper_keywords.keyword';
				$joinTables .= '
					LEFT JOIN `paper_keywords` ON
						(`papers`.id = `paper_keywords`.id)';
			}
		}

		return array(
			'selectFields' => $selectFields,
			'joinTables' => $joinTables
		);
    }

    /*
     * Chooses where conditions.
    */
    private function preparePaperConditions(array $fetchOptions)
    {
		$conditions = array();

		$db = $this->_getDb();

		if (!empty($fetchOptions['paperId']))
		{
			if (isset($fetchOptions['paperId']))
			{
				$conditions[] = '`papers`.id = ' . $this->quote($fetchOptions['paperId']);
			}
		}

		if (!empty($fetchOptions['facultyId']))
		{
			if (isset($fetchOptions['facultyId']))
			{
				$conditions[] = '`authorship`.facultyId = ' . $this->quote($fetchOptions['facultyId']);
			}
		}

		if (!empty($fetchOptions['keyword']))
		{
			if (isset($fetchOptions['keyword']))
			{
				$conditions[] = '`paper_keywords`.keyword LIKE ' . $this->quote('%' . $fetchOptions['keyword'] . '%');
			}
		}

        return $this->getConditions($conditions);
    }

	/*
	 * Chooses grouping options
	*/
	private function preparePaperGroupOptions(array $fetchOptions)
	{
		$grouping = '';

		if (!empty($fetchOptions['groupBy']))
		{
			if (isset($fetchOptions['groupBy']))
			{
				$grouping = 'GROUP BY ' . $fetchOptions['groupBy'];
			}
		}

		return $grouping;
	}

	/*
	 * Get's all the keywords for a paper.
	*/
	public function getKeywords($papers)
	{
		$keywords = array();

		foreach ($papers as $paper)
		{
			$keywords[] = $paper['keyword'];
		}

		return $keywords;
	}


	/*
	 * Get's all the faculty ids.
	*/
	public function getFacultyIds($papers)
	{
		$ids = array();

		foreach ($papers as $paper)
		{
			$ids[] = $paper['facultyId'];
		}

		$ids = array_unique($ids);

		return $ids;
	}
}
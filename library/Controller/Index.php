<?php

class Controller_Index extends Controller
{
	public function actionIndex()
	{
		$this->view->setData('title', 'Home');

        $paperModel = new Model_Paper();

		if ($facultyId = Session::getInstance()->getSessionValue('id'))
		{
	        $fetchOptions = array(
	            'join' => array(
	                'authorship',
	                'keywords'
	            ),
                'groupBy' => '`papers`.id',
	            'facultyId' => $facultyId
	        );
	
			$papers = $paperModel->getPapers($fetchOptions);

		    $this->view->setData('papers', $papers);
		}

		return $this->view->render('assets/view/index.php');
	}
}
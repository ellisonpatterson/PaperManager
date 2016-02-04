<?php

class Controller_Search extends Controller
{
	public function actionIndex()
	{
		$this->view->setData('title', 'Search');

        $paperModel = new Model_Paper();

        $keyword = htmlspecialchars(isset($_POST['keyword']) ? $_POST['keyword'] : '');

        if (!empty($keyword))
        {
            $fetchOptions = array(
                'join' => array(
                    'authorship',
                    'keywords'
                ),
                'groupBy' => 'authorship.paperId',
                'keyword' => $keyword
            );
    
            $papers = $paperModel->getPapers($fetchOptions);
		    $this->view->setData('papers', $papers);
        }

		return $this->view->render('assets/view/search.php');
	}
}
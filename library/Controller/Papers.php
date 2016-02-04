<?php

class Controller_Papers extends Controller
{
    public function actionIndex()
    {
		$this->view->setData('title', 'Papers');

		return $this->view->render('assets/view/papers.php');
    }

    public function actionView()
    {
		$this->view->setData('title', 'View Paper');

        $paperId = htmlspecialchars(isset($_GET['paperId']) ? $_GET['paperId'] : '');
        $paper = $this->grabPaperData($paperId);

        if (!$paper)
        {
            return $this->redirectController('Controller_Error');
        }

        $keywords = $this->getPaperModel()->getKeywords($paper);
        $facultyIds = $this->getPaperModel()->getFacultyIds($paper);

        $facultyModel = new Model_Faculty();
        $emails = $facultyModel->getUsersByPaperId($paperId);
        $emails = $facultyModel->getEmails($emails);

        $dataModifier = new DataModifier_Paper();
        $dataModifier->incrementPageView($paperId);

		$this->view->setData('paper', $paper[0]);
		$this->view->setData('keywords', $keywords);
		$this->view->setData('facultyIds', $facultyIds);
		$this->view->setData('emails', $emails);

		return $this->view->render('assets/view/papers/view.php');
    }

    public function actionAdd()
    {
		$this->view->setData('title', 'Add Paper');

		return $this->view->render('assets/view/papers/add.php');
    }

    public function actionAddProcess()
    {
	    $this->requestPostOnly();

		$input = array(
			'title' => htmlspecialchars($_POST['title']),
			'description' => htmlspecialchars($_POST['description']),
			'citation' => htmlspecialchars($_POST['citation'])
		);

        $paperId = $this->getPaperModel()->getHighestId();
        $paperId++;

        $dataModifier = new DataModifier_Paper();
        $dataModifier->insertPaper($paperId, $input['title'], $input['description'], $input['citation']);
        $dataModifier->insertAuthorship(Session::getInstance()->getSessionValue('id'), $paperId);

        return $this->redirectRoute('Controller_Papers', 'actionEdit', '&paperId=' . $paperId);
    }

    public function actionEdit()
    {
		$this->view->setData('title', 'Edit Paper');

        $paperId = htmlspecialchars(isset($_GET['paperId']) ? $_GET['paperId'] : '');
        $paper = $this->grabPaperData($paperId);

        if (!$paper)
        {
            return $this->redirectController('Controller_Error');
        }

        $keywords = $this->getPaperModel()->getKeywords($paper);

		$this->view->setData('paper', $paper[0]);
		$this->view->setData('keywords', $keywords);

		return $this->view->render('assets/view/papers/edit.php');
    }

    public function actionEditDetails()
    {
	    $this->requestPostOnly();

		$input = array(
			'paperId' => htmlspecialchars($_POST['paperId']),
			'title' => htmlspecialchars($_POST['title']),
			'description' => htmlspecialchars($_POST['description']),
			'citation' => htmlspecialchars($_POST['citation'])
		);

        $dataModifier = new DataModifier_Paper();
        $dataModifier->updatePaper($input['paperId'], $input['title'], $input['description'], $input['citation']);

        return $this->redirectRoute('Controller_Papers', 'actionEdit', '&paperId=' . $input['paperId']);
    }

    public function actionEditKeywords()
    {
	    $this->requestPostOnly();

		$input = array(
			'paperId' => htmlspecialchars($_POST['paperId']),
			'keywords' => htmlspecialchars($_POST['keywords'])
		);

        $input['keywords'] = array_filter(preg_split('/\s*,\s*/', trim($input['keywords'])));

        $paperId = htmlspecialchars(isset($_POST['paperId']) ? $_POST['paperId'] : '');
        $paper = $this->grabPaperData($paperId);

        if (!$paper)
        {
            return $this->redirectController('Controller_Error');
        }

        $keywords = $this->getPaperModel()->getKeywords($paper);

        $dataModifier = new DataModifier_Paper();
        if (!empty($input['keywords']))
        {
            $input['keywords'] = array_diff($input['keywords'], $keywords);
            foreach ($input['keywords'] as $keyword)
            {
                $dataModifier->insertPaperKeyword($input['paperId'], $keyword);
            }
        }

        return $this->redirectRoute('Controller_Papers', 'actionEdit', '&paperId=' . $input['paperId']);
    }

    public function actionDelete()
    {
		$this->view->setData('title', 'Delete Paper');

        $paperId = htmlspecialchars(isset($_GET['paperId']) ? $_GET['paperId'] : '');
        $paper = $this->grabPaperData($paperId);

		$this->view->setData('paper', $paper[0]);

		return $this->view->render('assets/view/papers/delete.php');
    }

    public function actionDeleteProcess()
    {
		$input = array(
			'paperId' => htmlspecialchars($_GET['paperId'])
		);

        $dataModifier = new DataModifier_Paper();
        $dataModifier->deletePaperKeyword($input['paperId']);
        $dataModifier->deleteAuthorship($input['paperId']);
        $dataModifier->deletePaper($input['paperId']);

        return $this->redirectRoute('Controller_Index', 'actionIndex');
    }

    private function grabPaperData($paperId)
    {
        if (!$paperId)
        {
            return false;
        }

        $fetchOptions = array(
            'join' => array(
                'authorship',
                'keywords'
            ),
            'paperId' => $paperId
        );

        $paper = $this->getPaperModel()->getPapers($fetchOptions);

        if (!$paper)
        {
            return false;
        }

        return $paper;
    }

    private function getPaperModel()
    {
        return new Model_Paper();
    }
}
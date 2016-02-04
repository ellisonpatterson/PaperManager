<?php

class Controller_Error extends Controller
{
    public function actionIndex()
    {
		$this->view->setData('title', 'Error');

		return $this->view->render('assets/view/error.php');
    }
}
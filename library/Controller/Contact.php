<?php

class Controller_Contact extends Controller
{
	public function actionIndex()
	{
		$this->view->setData('title', 'Contact Us');

		return $this->view->render('assets/view/contact.php');
	}

    public function actionProcess()
    {
	    $this->requestPostOnly();

		$input = array(
			'name' => htmlspecialchars($_POST['name']),
			'email' => htmlspecialchars($_POST['email']),
			'message' => htmlspecialchars($_POST['message'])
		);

        $headers = 'From: '. 'emp5557@rit.edu' . "\r\n" . 'Reply-To: ' . 'emp5557@rit.edu' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        @mail($input['email'], 'Project 2 - Contact Us', $input['message'], $headers);

        return $this->redirectRoute('Controller_Index', 'actionIndex');
    }
}
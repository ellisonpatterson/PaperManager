<?php

class Controller_Login extends Controller
{
    public function actionIndex()
    {
		$this->view->setData('title', 'Login');

		return $this->view->render('assets/view/login.php');
    }

    public function actionLogout()
    {
		$facultyModel = new Model_Faculty();
        $facultyModel->destroyUserSession();

        return $this->redirectRoute('Controller_Index', 'actionIndex');
    }

	public function actionProcess()
	{
	    $this->requestPostOnly();

		$input = array(
			'email' => htmlspecialchars($_POST['email']),
			'password' => htmlspecialchars($_POST['password']),
			'ldap' => htmlspecialchars($_POST['ldap'])
		);

		if ($input['ldap'])
		{
			return $this->useLdap($input);
		}

		$facultyModel = new Model_Faculty();

		if ($information = $facultyModel->validateUser($input['email'], $input['password']))
		{
		    $facultyModel->createUserSession($information);

		    return $this->redirectRoute('Controller_Index', 'actionIndex');
		}
		else
		{
		    return $this->redirectRoute('Controller_Login', 'actionIndex');
		}
	}

	private function useLdap(array $input)
	{
	    $this->requestPostOnly();

		$facultyModel = new Model_Faculty();

		if ($information = $facultyModel->initiateLdap($input['email'], $input['password']))
		{
		    $facultyModel->createUserSession($information);

		    return $this->redirectRoute('Controller_Index', 'actionIndex');
		}
		else
		{
		    return $this->redirectRoute('Controller_Login', 'actionIndex');
		}
	}
}
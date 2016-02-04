<?php

class Model_Faculty extends Model
{
    /*
     * Gets all available users
    */
    public function getAllUsers()
    {
        return $this->selectAll('SELECT * FROM `faculty`');
    }

    /*
     * When a user logs in, this checks their information against the database.
     * If it matches a user, it approves the login.
    */
    public function validateUser($email, $password)
    {
        return $this->selectSingle('SELECT * FROM `faculty` WHERE `email` = ' . $this->quote($email) . ' AND `password` = ' . $this->quote($password));
    }

    /*
     * Get's all users by a paper ID.
    */
    public function getUsersByPaperId($paperId)
    {
        return $this->selectAll('SELECT * FROM `faculty` LEFT JOIN `authorship` ON (`authorship`.facultyId = `faculty`.id) WHERE `authorship`.paperId = ' . $this->quote($paperId));
    }

    /*
     * Checks if their Email is on the DB.
    */
    public function validateUserByEmail($email)
    {
        return $this->selectSingle('SELECT * FROM `faculty` WHERE `email` = ' . $this->quote($email));
    }

    /*
     * Use LDAP RIT server.
    */
    public function initiateLdap($email, $password)
    {
        $ldapServer = 'ldap.rit.edu';
        $ldapPort = '636';
        $ldapBaseDN = 'ou=people,dc=rit,dc=edu';

        $user = explode('@', $email);
        $ldapUser = 'uid=' . $user[0] . ',ou=people,dc=rit,dc=edu';

        $ds = ldap_connect('ldaps://' . $ldapServer . ':' . $ldapPort);
        $lb = ldap_bind($ds, $ldapUser, $password);
    	$sr = ldap_search($ds, $ldapBaseDN, 'uid=' . $user[0]);
    	$info = ldap_get_entries($ds, $sr);

    	$email = $info[0]['mail'][0];

        return $this->validateUserByEmail($email);
    }

	/*
     * Get's all emails from a query.
	*/
	public function getEmails($query)
	{
		$emails = array();

		foreach ($query as $data)
		{
			$emails[] = $data['email'];
		}

		return $emails;
    }

    /*
     * Creates a User session.
    */
    public function createUserSession(array $information)
    {
        Session::getInstance()->logSession($information);
    }

    /*
     * Removes a User session.
    */
    public function destroyUserSession()
    {
        Session::getInstance()->destroySession();
    }
}
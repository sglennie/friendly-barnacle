<?php

/*
	Authorization Class
	Deal with auth tasks
*/

class Auth
{
	private $salt = 'alpha_num hidden';
	
	/*
		Constructor
	*/
	function __construct()
	{
	}
	
	/*
		Functions
	*/
	function validateLogin($user, $pass)
	{
		// access db
		global $Database;
		
		// create query
		if ($stmt = $Database->prepare("SELECT * FROM users WHERE username = ? AND password = ?"))
		{
			$stmt->bind_param("ss", $user, md5($pass . $this->salt));
			$stmt->execute();
			$stmt->store_result();
			
			// check for num rows
			if ($stmt->num_rows > 0)
			{
				// success 
				$stmt->close();
				return TRUE;
			}
			else
			{
				// failure
				$stmt->close();
				return FALSE;
			}
		}
		else
		{
			die("ERROR: Could not prepare MYSQLi statement.");
		}
	}
	
	function checkLoginStatus()
	{
		if (isset($_SESSION['loggedin']))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function logout()
	{
		session_destroy();
		session_start();
	}
}
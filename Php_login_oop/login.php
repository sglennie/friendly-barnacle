<?php

include("includes/database.php");
include("includes/init.php");

if (isset($_POST['submit']))
{
	// get data
	$Template->setData('input_user', $_POST['username']);
	$Template->setData('input_pass', $_POST['password']);
	
	// validate data
	if ($_POST['username'] == '' || $_POST['password'] == '')
	{
		// show error
		if ($_POST['username'] == '') { $Template->setData('error_user', 'required field!'); }
		if ($_POST['password'] == '') { $Template->setData('error_pass', 'required field!'); }
		$Template->setAlert('Please fill in all required fields', 'error');
		$Template->load("views/v_login.php");
	}
	else if ($Auth->validateLogin($Template->getData('input_user'), $Template->getData('input_pass')) == FALSE)
	{
		// invalid login
		$Template->setAlert('Invalid username or password!', 'error');
		$Template->load("views/v_login.php");
	}
	else
	{
		// successful log in
		$_SESSION['username'] = $Template->getData('input_user');
		$_SESSION['loggedin'] = TRUE;
		$Template->setAlert('Welcome <i>' . $Template->getData('input_user') . '</i>');
		$Template->redirect("members.php");
	}
}
else
{
	$Template->load("views/v_login.php");
}
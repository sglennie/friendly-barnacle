<?php

include("includes/init.php");

// check authorization
if ($Auth->checkLoginStatus() == FALSE)
{
	$Template->setAlert('Unauthorized!', 'error');
	$Template->redirect('login.php');
}
else
{
	$Template->load("views/v_members.php");
}
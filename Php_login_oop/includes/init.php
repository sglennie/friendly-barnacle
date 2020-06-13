<?php

/*
	INIT
	Basic configuration settings
*/

// create objects
include("models/m_template.php");
include("models/m_auth.php");
$Template = new Template();
$Template->setAlertTypes(array('success', 'warning', 'error'));

$Auth = new Auth();

// start session
session_start();
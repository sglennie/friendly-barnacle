<?php

include("includes/init.php");

// log out
$Auth->logout();

// redirect
$Template->setAlert('Successfully logged out!');
$Template->redirect('login.php');
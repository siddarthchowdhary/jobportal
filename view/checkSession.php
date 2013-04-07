<?php
	//Start session
	session_start();
	
	//Check whether the session variable EMAIL_SESSION is present or not
	if(!isset($_SESSION['EMAIL_SESSION']) || (trim($_SESSION['EMAIL_SESSION']) == '')) {
		header("Location: indexMain.php?controller=pages&function=accessDenied");   
		exit();
	}
?>

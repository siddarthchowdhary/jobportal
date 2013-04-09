<?php
	require ("../config/constants.php");
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['DISPLAY_NAME_SESSION']);
	unset($_SESSION['EMAIL_SESSION']);
	unset($_SESSION['USERTYPE_SESSION']);
	unset($_SESSION['ID_USERS_SESSION']);
	
	session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logged Out</title>
<link href="<?php echo CSS_PATH;?>loginModule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Logout </h1>
<p align="center"></p>
<h4 align="center" class="err">You have been logged out.</h4>
<p align="center">Click here to <a href="<?php echo SITE_PATH;?>indexMain.php">Login</a></p>
</body>
</html>

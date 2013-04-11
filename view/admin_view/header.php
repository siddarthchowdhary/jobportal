<?php
/* @author 		: Ashwani Singh
 * @date   		: 21-03-2013
 * @description : Admin Header
 * @module 		: Admin
 * @modified on : 01-04-2013
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admininstrator</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery-1.7.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery.main.js';?>"></script>	
	<script src="<?php echo JS_PATH.'jquery.js';?>" type="text/javascript"></script>
	<script src="<?php echo JS_PATH.'jquery.dataTables.js';?>" type="text/javascript"></script>
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="<?php echo SITE_PATH.'indexMain.php?controller=AdminHome&function=display'?>">Job Portal</a></h1>
				<div class="login-block">
					
					<pre>hi <?php echo $_SESSION['DISPLAY_NAME_SESSION'];?></pre>
					<a href="<?php echo SITE_PATH.'indexMain.php?controller=Logout&function=logout'?>">Logout</a>
					</pre>
				</div>
			</div>
			<ul id="nav">
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=AdminHome&function=display'?>">Home</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=display'?>">Home Page Ads</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=display'?>">Manage Site Information</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=display'?>">Employer Management</a></li>
		<!--	<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=ProductSetting&function=display'?>">Product Setting</a></li>
		-->		<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=display'?>">Reports</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=display'?>">Database Management</a></li>
				
			</ul>
		</div>
	</div>


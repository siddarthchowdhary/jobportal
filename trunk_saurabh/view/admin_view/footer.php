<?php
/* @author : Ashwani Singh
 * @date   : 21-03-13
 * @description : Admin footer
 * 
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
</head>
<body>
<div id="footer">
		<div class="holder">
			
			<ul class="footer-nav">
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=AdminHome&function=display'?>">Home</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=display'?>">Home Page Ads</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=display'?>">Manage Site Information</a></li
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=display'?>">Employer Management</a></li>
		<!--	<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=ProductSetting&function=display'?>">Product Setting</a></li>
		-->		<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=display'?>">Reports</a></li>
				<li><a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=display'?>">Database Management</a></li>
				<li><a href="#">Newsletter</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<div class="info">
				<span class="copy">Copyright (c) 2009 <a href="mailto:&#100;&#101;&#115;&#105;&#103;&#110;&#121;&#111;&#117;&#114;&#119;&#097;&#121;&#046;&#110;&#101;&#116;">&#100;&#101;&#115;&#105;&#103;&#110;&#121;&#111;&#117;&#114;&#119;&#097;&#121;&#046;&#110;&#101;&#116;</a></span>
				<ul>
					<li><a href="#">Terms of use</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Disclaimer</a></li>
				</ul>
			</div>
		</div>
	</div>
	
</body>
</html>

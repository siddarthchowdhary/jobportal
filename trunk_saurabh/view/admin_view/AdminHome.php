
<?php
//Start session
//session_start();

//Check whether the session variable EMAIL_SESSION is present or not
/*
if(!isset($_SESSION['EMAIL_SESSION']) || (trim($_SESSION['EMAIL_SESSION']) == '')) {
	header("location: access_denied.php");                        //correct path here
	exit();
}
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');

include_once 'header.php';
?>
	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>HOME<span>ADMIN</span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
								<img src=<?php echo IMAGE_PATH."admin_images/admin_home.jpg";?> />
							</div>	
						</div>
					</div>
				</div>
			</div>

		<div id="sidebar">
				<div class="block">   <!--write one block div for one box sidebar-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>Site<span>Map</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=AdminHome&function=changePassword';?>">Change Password</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=display';?>">Home Page Ads</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=display';?>">Manage Site Information</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=display';?>">Employer Management</a>
					<!--	<a href="<?php echo SITE_PATH.'indexMain.php?controller=ProductSetting&function=display';?>">Product Setting</a>
					-->		<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=display';?>">Reports</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=display';?>">Database Management</a>
							</div>

						</div>
					</div>
				</div>
		</div>

	</div>

<?php 
include_once 'footer.php'; 
?>

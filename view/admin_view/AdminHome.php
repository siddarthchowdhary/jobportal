<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : Admin main view (landing page after login)
 * @module 		: Admin
 * @modified on : 
*/
/*
if(!isset($_SESSION['EMAIL_SESSION']) || (trim($_SESSION['EMAIL_SESSION']) == '')) {
	header("location: access_denied.php");                        //correct path here
	exit();
}
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/config/constants.php');

include_once 'header.php';
?>
	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo ADMIN_HOME; ?></span></h2>
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
								<h3><span><?php SITE_MAP; ?></span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=AdminHome&function=adminChangePassword';?>"><?php echo MANAGE_PASSWORD; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=display';?>"><?php echo MANAGE_ABOUT_US; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=display';?>"><?php echo MANAGE_SITE_INFORMATION; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=display';?>"><?php echo MANAGE_EMPLOYER; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=display';?>"><?php echo MANAGE_REPORTS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=display';?>"><?php echo MANAGE_DATABASE; ?></a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php 
include_once 'footer.php'; 
?>

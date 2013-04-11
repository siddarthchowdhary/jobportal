<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : Employer management view
 * @module 		: Admin
 * @modified on : 
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
ini_set("display_errors","1");
include_once 'header.php';
?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo EMPLOYER_MANAGEMENT; ?></span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
								<img src=<?php echo IMAGE_PATH."admin_images/employer";?> />
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
								<h3><span><?php echo MAIN_MENU;?></span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerStatistics';?>"><?php echo EMPLOYER_STATISTICS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerMain';?>"><?php echo EMPLOYER_MANAGE; ?></a>
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


<?php
/* @author 		: Ashwani Singh
 * @date   		: 03-04-2013
 * @description : Database management view
 * @module 		: Admin
 * @modified on : 
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>Database<span>Management</span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
								<img src=<?php echo IMAGE_PATH."admin_images/database";?> />
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
								<h3>Main<span>Menu</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=showIndustry';?>">Show Industries</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=addIndustry';?>">Add New Industry</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=DatabaseManagement&function=employerDeactivate';?>">Deactivate Employer</a>
						    </div>
						</div>						
					</div>
				</div>
		</div>
		</div>

	</div>
	  <script>
	
	
	   </script>
	-->
	
	  

<?php 
include_once 'footer.php'; 


?>



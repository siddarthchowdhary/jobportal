<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : Employer management view
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
								<h2>Employer<span>Management</span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
                                      <?php print_r($arrData);?>
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
								<h3>Main<span>prince</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerStatistics';?>">Employer Statistics</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerActivate';?>">Activate Employer</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=employerDeactivate';?>">Deactivate Employer</a>
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

<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : SiteStatistics view
 * @module 		: Admin
 * @modified on : 
*/
include_once 'header.php';
?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo SITE_STATISTICS; ?></span></h2>
							</div>
							<!--code here-->
							<div id="content">
								<b> Number of hits:</b>
								 <?php print_r($arrData);
								 
								 echo session_save_path();
								 ?>
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
								<h3><span><?php echo MAIN_MENU; ?></span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=siteStatistics';?>"><?php echo SITE_STATISTICS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=jobseekerReports';?>"><?php echo MANAGE_JOBSEEKER_REPORTS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=employerReports';?>"><?php echo MANAGE_EMP_REPORTS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=jobReports';?>"><?php echo MANAGE_JOB_REPORTS; ?></a>
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




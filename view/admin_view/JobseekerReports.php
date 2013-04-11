<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : JobseekerReports view
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
								<h2><span><?php echo JOBSEEKER_REPORTS; ?></span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
								<p><?php echo JOBSEEKER_TOTAL.$arrData['TotalJobseekers']; ?> </p>
								<p><?php echo JOBSEEKER_ACTIVE.$arrData['ActiveJobseekers']; ?> </p>
								<p><?php echo JOBSEEKER_INACTIVE.$arrData['InactiveJobseekers'];?> </p>
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


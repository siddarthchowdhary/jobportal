<?php
/* @author 		: Ashwani Singh
 * @date   		: 05-04-2013
 * @description : Employer statistics view
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
								<h2><span><?php echo EMPLOYER_STATS;?></span></h2>
							</div>
							<!--code here-->
							<div id="admin_content" >
								<p><?php echo EMPLOYER_TOTAL.$arrData['TotalEmployer']; ?> </p>
								<p><?php echo EMPLOYER_ACTIVE.$arrData['ActiveEmployer']; ?> </p>
								<p><?php echo EMPLOYER_INACTIVE.$arrData['InactiveEmployer'];?> </p>
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



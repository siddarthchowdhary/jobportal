<?php
/* @author 		: Ashwani Singh
 * @date   		: 12-04-2013
 * @description : Statistics statistics view
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
								<h2><span><?php echo COMPANY_STATS;?></span></h2>
							</div>
							<!--code here-->
							<div id="admin_content" >
								<p><?php echo COMPANY_TOTAL.$arrData['TotalCompany']; ?> </p>
								<p><?php echo COMPANY_ACTIVE.$arrData['ActiveCompany']; ?> </p>
								<p><?php echo COMPANY_INACTIVE.$arrData['InactiveCompany'];?> </p>
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
						    <a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=companyStatistics';?>"><?php echo COMPANY_STATISTICS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=EmployerManagement&function=companyMain';?>"><?php echo COMPANY_MANAGE; ?></a>
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



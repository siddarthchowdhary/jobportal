<?php
/* @author 		: Ashwani Singh
 * @date   		: 03-04-2013
 * @description : Database management view
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
								<h2><span><?php echo DATABASE_MGMT; ?></span></h2>
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
								<h3><span><?php echo MAIN_MENU; ?></span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=mastermanagement&function=displayview';?>">Industry Management</a>
							
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



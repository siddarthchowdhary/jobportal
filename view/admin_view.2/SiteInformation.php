
<?php
/* @author 		: Ashwani Singh
 * @date   		: 29-03-2013
 * @description : SiteInformation view
 * @module 		: Admin
 * @modified on : 31-03-2013
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
								<h2>Site Information<span>Management</span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
								<img src=<?php echo IMAGE_PATH."admin_images/site_information";?> />
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
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">Manage About Us</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showContactUs';?>">Manage Contact Us</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">Change Logo</a>
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


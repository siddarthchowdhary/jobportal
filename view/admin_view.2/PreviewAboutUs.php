<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-2013
 * @description : PreviewAboutUs view 
 * @module		: Admin 
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
								<h2><span>ABOUT US</span></h2>
							</div>
							<!--code here-->
							<?php 
							foreach($arrData as $key => $value ) {
								print_r($value);
							
							}
							?>
							<div class="admin_anchor">
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">
							          click here to go back </a>
							</div>          
						</div>
					</div>
				</div>
			</div>

		

<?php 
include_once 'footer.php'; 


?>



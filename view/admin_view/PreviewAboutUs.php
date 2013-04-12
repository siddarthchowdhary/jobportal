<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-2013
 * @description : PreviewAboutUs view 
 * @module		: Admin 
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
								<h2><span><?php echo ABOUT_US; ?></span></h2>
							</div>
							<!--code here-->
							<?php 
							foreach($arrData as $key => $value ) {
								print_r($value);							
							}
							?>
							<div>
								<a class="btn" href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>" >
							          <?php echo CLICK_HERE_TO_GO_BACK; ?></a>
							</div>                             
						</div>
					</div>
				</div>
			</div>

		

<?php 
include_once 'footer.php'; 


?>



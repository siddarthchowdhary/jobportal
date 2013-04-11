<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-2013
 * @description : PreviewHomePageAds view 
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
								<h2><span><?php echo HOME_PAGE_ADS; ?></span></h2>
							</div>
							<!--code here-->
							 <div id="Ads" >
							 
							   <img src=<?php echo ADS_IMAGE_PATH.$arrData['filename'];?>  height=300 width=400/>
						    </div>
							<div>
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showAds';?>" class="admin_btn">
							          <?php echo CLICK_HERE_TO_GO_BACK; ?></a>
							</div>          
						</div>
					</div>
				</div>
			</div>

		

<?php 
include_once 'footer.php'; 


?>




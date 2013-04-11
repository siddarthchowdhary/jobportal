<?php
/* @author 		: Ashwani Singh
 * @date   		: 04-04-2013
 * @description : Preview Tip of Day view 
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
								<h3><span><?php echo TIP_OF_THE_DAY; ?></span></h3>
							</div>
							<div class="article">
								<?php 
									foreach($arrData as $key => $value ) {
										echo "<p>"; print_r($value);							
									}
								?>
							</div>
							<a class="btn" href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showTipOfDay';?>">
									<?php echo CLICK_HERE_TO_GO_BACK; ?></a>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>		
		

<?php 
include_once 'footer.php'; 


?>




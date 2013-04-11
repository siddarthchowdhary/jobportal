<?php
/* @author 		: Ashwani Singh
 * @date   		: 04-04-2013
 * @description : JobPortal Home Page Error Ads view 
 * @module		: Admin
*/
ini_set("display_errors","1");
include_once 'header.php';
?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo ADS_ERROR; ?></span></h2>
							</div>
							<!--code here-->
							
								<div id="admin_error">
									 <b> <?php echo $arrData ?>	</b>
								</div>	 		
								<div>
									<a class="btn" href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=uploadAds'?>" >
							          <?php echo GOBACK_TRY_AGAIN; ?></a>
								</div>          
						
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

		
<?php
include_once 'footer.php'
?>


<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-13
 * @description : JobPortal Home Page show Ads view 
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
								<h2><span><?php echo HOME_PAGE_ADS; ?></span></h2>
							</div>
							<!--code here-->
							<div id="content">
								<div id="Ads" >
									<img src=<?php echo ADS_IMAGE_PATH.$arrData['filename'];?>  height=100 width=200 />
								</div>
								<a class="admin_btn" href="<?php echo 'indexMain.php?controller=HomePageAds&function=uploadAds'?>">
							          <?php echo ADD;?></a>
					        <div>
								<a class="btn" href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=previewAds';?>">
							          <?php echo PREVIEW;?></a>
						</div>          
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
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showAds';?>"><?php echo MANAGE_ADS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showTipOfDay';?>"><?php echo MANAGE_TIP_OF_DAY; ?></a>
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

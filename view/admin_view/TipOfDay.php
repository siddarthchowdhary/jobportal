<?php
/* @author 		: Ashwani Singh
 * @date   		: 04-04-2013
 * @description : Tip Of the day view 
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
								<h2><span><?php echo TIP_OF_THE_DAY;?></span></h2>
							</div>
							<!--code here-->
							<div id="content">
							<form  action="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=updateTipOfDay'?>" method="post">
								<?php 
							 	$data="";
								foreach($arrData as $key => $value ) {
								
								$data .=$value;
							
								}
							
								?>
								<textarea class="admin_textarea" id="tipOfDay" name="tipOfDay" ><?php print_r($data); ?></textarea> 
					        	
					        	<input class="admin_btn" name="btn1" id="btn1" type="submit" value="update" />
					        </form>
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=PreviewTipOfDay';?>" class="btn">
							          <?php echo PREVIEW;?></a>						        
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
								<h3><span><?php echo MAIN_MENU;?></span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showAds';?>"><?php echo MANAGE_ADS;?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showTipOfDay';?>"><?php echo MANAGE_TIP_OF_DAY;?></a>
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




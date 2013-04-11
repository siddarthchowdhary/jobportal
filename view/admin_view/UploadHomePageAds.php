<?php
/* @author 		: Ashwani Singh
 * @date   		: 02-04-2013
 * @description : JobPortal Home Page upload Ads view 
 * @module		: Admin
 * @todo 		: apply client side validation on url format www.example.com
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
								<h2><span><?php echo HOME_PAGE_ADS;?></span></h2>
							</div>
							<!--code here-->
							<div id="content">
							<form  action="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=addAds'?>" method="post" enctype="multipart/form-data">
								 <table>
									<tr><td><?php echo CHOOSE_FILE; ?>:<input type="file" name="fileName" /> </td></tr>
									<tr><td><?php echo CHOOSE_FILE_NAME; ?>:<input type="text" name="userFileName"/></td></tr>
								    <tr><td><?php echo CHOOSE_URL; ?>:<input type="text" name="url"/></td></tr>		
								 </table>  			       		
					       		<input class="admin_btn" name="btn1" id="btn1" type="submit" value="add" />
					       		
					        </form>
					        <div>
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=previewAds';?>" class="btn">
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
								<h3><span><?php echo MAIN_MENU;?></span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showAds';?>"><?php echo MANAGE_ADS?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>"><?php echo MANAGE_TIP_OF_DAY?></a>
						    </div>
						</div>						
					</div>
				</div>
		</div>
		
	</div>
		
<?php
include_once 'footer.php'
?>

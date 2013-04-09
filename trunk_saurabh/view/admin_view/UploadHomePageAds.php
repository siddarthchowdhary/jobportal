<?php
/* @author 		: Ashwani Singh
 * @date   		: 02-04-2013
 * @description : JobPortal Home Page upload Ads view 
 * @module		: Admin
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
								<h2><span>HOME PAGE ADS</span></h2>
							</div>
							<!--code here-->
							<div id="content">
							<form  action="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=addAds'?>" method="post" enctype="multipart/form-data">
								 Choose file :<input type="file" name="fileName" /> <br>
			name:<input 		 Choose file name:<type="text" name="userFileName"/><br>
					       		<input name="btn1" id="btn1" type="submit" value="upload" />
					        </form>
					        <div class="admin_anchor">
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=previewAds';?>">
							          Preview</a>
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
								<h3>Main<span>Menu</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=HomePageAds&function=showAds';?>">Manage Ads</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">Manage Tip Of The DaY</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=showAboutUs';?>">Change Logo</a>
						    </div>
						</div>						
					</div>
				</div>
		</div>
		</div>

	</div>
	  <script>
		
<?php
include_once 'footer.php'
?>

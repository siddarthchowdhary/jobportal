<?php
/* @author 		: Ashwani Singh
 * @date   		: 29-03-2013
 * @description : AboutUs view 
 * @module		: Admin 
 * @modified on : 30-03-2013
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
							<div id="content">
							<form  action="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=updateAboutUs'?>" method="post">
								<?php 
							 	$data="";
								foreach($arrData as $key => $value ) {
								
								$data .=$value;
							
								}
							
								?>
								<textarea class="admin_textarea" id="AboutUs" name="aboutUs" ><?php print_r($data); ?></textarea> 
					        	
					        	<input class="admin_btn" name="btn1" id="btn1" type="submit" value="update" />
					        </form>
					        <div class="admin_anchor">
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=PreviewAboutUs';?>" class="btn">
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
		
<?php
include_once 'footer.php'
?>	  



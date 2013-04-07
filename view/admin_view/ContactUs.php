<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-2013
 * @description : AboutUs view 
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
								<h2><span>CONTACT US</span></h2>
							</div>
							<!--code here-->
							<div id="content">
							<form  action="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=updateContactUs'?>" method="post">
								<?php 
							 	$data="";
								foreach($arrData as $key => $value ) {
								
								$data .=$value;
							
								}
							
								?>
								<textarea class="admin_textarea" id="ContactUs" name="contactUs"><?php echo $data; ?></textarea> 
					        	<input class="admin_btn" name="btn1" id="btn1" type="submit" value="update" />
					        </form>
					        <div class="admin_anchor">
								<a href="<?php echo SITE_PATH.'indexMain.php?controller=SiteInformation&function=PreviewContactUs';?>">
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




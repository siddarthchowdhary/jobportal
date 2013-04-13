<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : Employer management view
 * @module 		: Admin
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
								<h2>Database<span>Management</span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">
                                    
							<img src=<?php echo IMAGE_PATH."admin_images/employer";?> />
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
								<h3>Main<span>jobs</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
		
		
     
		 <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=companyedit';?>">Company Details </a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=masteredit';?>">Master Table </a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=jobavailableedit';?>">Jobs Available</a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=addJob';?>">Add Jobs </a>
   
		
						    </div>
						</div>						
					</div>
				</div>
		         </div>
		</div>

	</div>         
	 
	
	
	  

<?php 
include_once 'footer.php'; 


?>

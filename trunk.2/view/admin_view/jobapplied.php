<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : Employer management view
 * @module 		: Admin
 * @modified on : 
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>
	
 <style>
 		#insert,#delete,#update,#txtActionValue
 		{
 			display:none;
 		}

	</style>


	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
				
					<div class="holder">
						<div class="frame">
                                                   
							<div class="title">
								<h2>Employer<span>Management</span></h2>
							</div>
							<!--code here-->
							<div id="admin_content">

	<form id="myform">
	
	<input class="add"  type="button" value="add" name="add" id="add1"/>
            
	 <input class="del" type="button" value="delete" name="remove" id="delete1"/>
	 <input class="updt" type="button" value="update" name="change" id="update1"/>
	  <input type="text" name="txtActionValue" id="txtActionValue" value=""/>

		   <div id="insert">
			 <table>  
			 <tr><td>JobId:</td><td> <input type="text" name="job1" id="job1" /></td></tr>
			<tr><td>UserId:</td><td> <input type="text" name="user1" id="user1" /></td></tr>
			</table> 
			</br>
	       
	          </div>
		<div id="delete">
	    	   	<table>
			 <tr><td>JobId:</td><td> <input type="text" name="job3" id="job3" /></td></tr>
			<tr><td>UserId:</td><td> <input type="text" name="user3" id="user3" /></td></tr> 
			</table>
	 	</div>
		<div id="content">
	 	   <div id="update">
			<table>			
			 <tr><td>JobId:</td><td> <input type="text" name="job2" id="job2" /></td></tr>
			<tr><td>UserId:</td><td> <input type="text" name="user2" id="user2" /></td></tr> 
			</table>
	 	</div>
	      </div>
	
	 
	       <div id="a"></div>
		<p></p>
	 
	 
	   		<input type="button" name="usersubmit" id="usersubmit" value="sendData" /></br>
			
	 
	 
	 
	</form>
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
								<h3>Main<span>prince</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
	
	
		
     
	 <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=companyedit';?>">Company Details </a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=employeredit';?>">Employer Details </a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=usersedit';?>">Users </a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=masteredit';?>">Master Table </a>
	 <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=jobseekeredit';?>">Jobseeker Professional Details </a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=jobavailableedit';?>">Jobs Available</a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=jobapplyedit';?>">Jobs Applied</a>
         <a href="<?php echo SITE_PATH.'indexMain.php?controller=dbmanagement&function=addJob';?>">Add Jobs </a>
		
   
		
						    </div>
						</div>						
					</div>
				</div>
		         </div>
		</div>

	</div>

	   <script type="text/javascript">
	   
           
	   
	     $(".add").click(function ()
	    		 {
		
              $("#txtActionValue").val('1');
    		      $("#insert").show();
		       $("#delete").hide();
			$("#update").hide();
                      
	    		 });

	     $(".del").click(function ()
	    		 {
	    	    $("#delete").show();
		    $("#txtActionValue").val('2');
		    
    		      $("#insert").hide();
		       
			$("#update").hide();
	    		 });

	     $(".updt").click(function ()
	    		 {
	    	    $("#update").show();
             $("#txtActionValue").val('3');
	     
    		      $("#insert").hide();
		       $("#delete").hide();
			
	    		 });
	   
		 $("#usersubmit").click(function() {
		
		       var str=$("#myform").serialize();
		     $.ajax({
			url:"indexMain.php?controller=jobapplied&function=save",
			data:str,
			type:"POST",
			success:function ()
			 {     alert(str);
				var a=$("#txtActionValue").val();
				if (a == 1){
				  $("p:first").text("data inserted successfully");
				}else if (a == 2){
				  $("p:first").text("data deleted successfully");
				}	else if (a == 3){
				  $("p:first").text("data updated successfully");
				}else{
				  $("p:first").text("no operation is selected");
				}
			 }
		      });
		   });
	    
    		 
	    </script>
	
<?php 
include_once 'footer.php'; 
?>

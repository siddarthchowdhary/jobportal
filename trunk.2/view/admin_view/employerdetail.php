<?php
/* @author 		: Prince Pandey
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
			 <tr><td>UserId:</td><td> <input type="text" name="user1" id="user1" /></td></tr>
			 <tr><td>CompanyId: </td><td><input type="text" name="comp1" id="comp1" /></td></tr>
			 <tr><td>ContactNo:</td><td> <input type="text" name="num1" id="num1" /></td></tr>
			 <tr><td>Gender:</td><td> <input type="text" name="gen1" id="gen1" /></td></tr> 
			</table>
	       
	          </div>
		<div id="delete">
	    	   UserId: <input type="text" name="user2" id="user2" </br>
	 	</div>
		
	 	   <div id="update">
			<table>
			 <tr><td>UserId: </td><td><input type="text" name="user3" id="user3" /></td></tr>
			 <tr><td>CompanyId: </td><td><input type="text" name="comp2" id="comp2" /></td></tr>
			  <tr><td>ContactNo:</td><td> <input type="text" name="num2" id="num2" /></td></tr>
			 <tr><td>Gender:</td><td> <input type="text" name="gen2" id="gen2" /></td></tr> 
			</table>
			
	 	   </div>
	        
                          <input type="button" name="usersubmit" id="usersubmit" value="sendData" /></br>
	 
	 <p></p>
	 
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
			url:"indexMain.php?controller=employerdetail&function=save",
			data:str,
			type:"POST",
			success:function ()
			 {
				var a=$("#txtActionValue").val()
			
				 
				if (a == 1){
					var user1=$("#user1").val();
					if(user1== ""){
						$("p:first").text("enter userid");
						return false;
					}
				  $("p:first").text("data inserted successfully");
				  $("#insert").hide(); 
				}else if (a == 2){
					var comp2=$("#user2").val();
					if(comp2 == ""){
						$("p:first").text("enter userid");
						return false;
					}
				  
				  $("p:first").text("data deleted successfully");
				  $("#delete").hide();
				}	else if (a == 3){
					var user3=$("#user3").val();
					if(user3== ""){
						$("p:first").text("enter userid");
						return false;
					}
				  $("p:first").text("data updated successfully");
					$("#update").hide();
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

<?php
/* @author 		: Prince Pandey
 * @date   		: 01-04-2013
 * @description : Company Management View
 * @module 		: Admin
 * @modified on : 
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>
	
 <style>
   #insert,#delete,#update,#txtActionValue{
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
    <form id="myform" action="indexMain.php?controller=companymanagement&function=save" method="post">
         <input class="add"  type="button" value="add"    name="add"    id="add1"/>
         <input class="del"  type="button" value="delete" name="remove" id="delete1"/>
	 <input class="updt" type="button" value="update" name="change" id="update1"/>
	 <input type="text" name="txtActionValue" id="txtActionValue" value=""/></br>
	
		   <div id="insert">
			 <table> 
			 <tr><td>CompanyName:</td><td> <input type="text" name="company_name1" id="company_name1"/></td></tr>
			 <tr><td>Website:</td><td> <input type="text" name="website" id="website1" /></td></tr>
			 <tr><td>KeyFunctionalArea:</td><td> <input type="text" name="key_functional_area" id="key_functional_area" /></td></tr>
			<tr><td>IndustryType:</td><td> <input type="text" name="industry_type" id="industry_type" /></td></tr>
		        <tr><td>Status:</td><td> <input type="text" name="status" id="status" /></td></tr>

			<tr><td>City:</td><td> <input type="text" name="city" id="city" /></td></tr> 
			<tr><td>Country:</td><td> <input type="text" name="country" id="country" /></td></tr> 
			</table>
	       
	          </div>
		<div id="delete">
	    	   CompanyName: <input type="text" name=" company_name2" id="company_name2" /></br>
	 	</div>
		
	 	<div id="update">
			<table>
	   		<tr><td>CompanyName:</td><td> <input type="text" name=" company_name3" id="company_name3" /></td></tr>
	    	<tr><td>Website: </td><td><input type="text" name="website2" id="website" /></td></tr>
			<tr><td>KeyFunctionalArea:</td><td> <input type="text" name="key_functional_area2" id="key_functional_area" /></td></tr>
			<tr><td>IndustryType: </td><td><input type="text" name="industry_type2" id="industry_type" /></td></tr> 
			<tr><td>Status: </td><td><input type="text" name="status2" id="status" /></td></tr> 
			 
			<tr><td>City: </td><td><input type="text" name="city2" id="city" /></td></tr> 
			<tr><td>Country:</td><td> <input type="text" name="country2" id="country" /></td></tr> 
			</table>
	 	</div>
                                          
					  <input type="button" name="usersubmit" id="usersubmit" value="sendData" />
				        </form>
					<p></p>
					<div id="result"></div>
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
								<h3>Main<span>prince</span></h3>
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
	  <script>
		
	   
	     $(".add").click(function (){
			$("#txtActionValue").val('1');
    		$("#insert").show();
		    $("#delete").hide();
			$("#update").hide();
                      
	    });

	     $(".del").click(function (){
	    	     $("#delete").show();
		     $("#txtActionValue").val('2');
		     $("#insert").hide();
		     $("#update").hide();
	    });

	    $(".updt").click(function (){
	    $("#update").show();
        $("#txtActionValue").val('3');
	   	$("#insert").hide();
		$("#delete").hide();
	     });

	     
		
		$("#usersubmit").click(function() {
			
		    var str=$("#myform").serialize();
		    $.ajax({
			url:"indexMain.php?controller=companymanagement&function=save",
			data:str,
			type:"POST",
			success:function (response)
			 {
				  
				var a=$("#txtActionValue").val();
				
			     if (a == 1){
					
					var comp1=$("#company_name1").val();
				
					if(comp1 == ""){
						$("p:first").text("enter company name");
					       return false;
					}if(comp1 !== ""){
				
						$("p:first").text(response);
						
					}
					$("#insert").hide();
					
				  
				}else if (a == 2){
					
					var comp2=$("#company_name2").val();
					if(comp2 == ""){
						$("p:first").text("enter company name");
						return false;
					}
				  $("p:first").text("data deleted successfully");
				  $("#delete").hide();
				  
				}else if (a == 3){
					var comp3=$("#company_name3").val();
					
					if(comp3 == ""){
						$("p:first").text("enter company name");
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

   
   
   
   
   
   
   
   
   
   
	    
	    

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
	#comp,#loc,#cat,#actionValue
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
					
	    <form id ="myform"  action="indexMain.php?controller=addjobhome&function=update" method="post"/>
	      <table>
		<tr><td><input  type="button" id="btn1"    name="btn" value="addcompany"/></td><td>
		        <input  type="button" id="btn2"    name="btn" value="addlocation"/></td><td>
		        <input  type="button" id="btn3"    name="btn" value="addcategory"/></td><tr>
	      </table>
		
		<div id="comp">CompanyName:<input  type="text" id="company"  name="company"/></div>
		<div id="loc"> LocationCity:<input type="text" id="location" name="location"/></div>
		<div id="cat">JobCategory:<input  type="text" id="category" name="category"/></div>
		<input type="text" name="actionValue" id="actionValue" value=""/>
		            <input  type="button" id="btn"    name="btn" value="add"/>
		            <input  type="submit" id="btn"    name="btn" value="submit"/>
		
	    </form>
	    <p></p>
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
	    $("#btn1").click(function ()
	     {
		$("#actionValue").val('1');
    		      $("#comp").show();
		      $("#loc").hide();
		      $("#cat").hide();
	     });
	    $("#btn2").click(function ()
	     {
               $("#actionValue").val('2');
		
    		  $("#comp").hide();
		      $("#loc").show();
		      $("#cat").hide();
	     });
	   $("#btn3").click(function ()
	     {
		$("#actionValue").val('3');
    		  $("#comp").hide();
		      $("#loc").hide();
		      $("#cat").show();
	     });
		
	    $("#btn").click(function ()
		{
		   var str=$("#myform").serialize();
		    $.ajax({
			url:"indexMain.php?controller=addjobhome&function=update",
			data:str,
			type:"POST",
			success:function (data)
			 {
			  //alert(data);
			 var a= $("#actionValue").val();
			 
			 if(a == 1){
				 var com1=$("#company").val();
				  if(com1 == ""){
				$("p:first").text("enter company name");
				  }
			   }

			 
			 else if(a == 2){
				 var com2=$("#location").val();
				  if(com2 == ""){
				$("p:first").text("enter location name");
				  }
			   }

			 
			 else if(a == 3){
				 var com3=$("#category").val();
				  if(com3 == ""){
				$("p:first").text("enter category name");
				  }
			   }
			 
			 
			 }
		  });
		});
	</script>
	
<?php 
include_once 'footer.php'; 
?>


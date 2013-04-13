
<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-2013
 * @description : PreviewAboutUs view 
 * @module		: Guest
 * @modified on : 
*/

//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>	    <style>
 		#insert,#delete,#update
 		{
 			display:none;
 		}
 		#validateMsg
 		{
 			color:red;
 		}
	   #search
	  {
	  background-color:red;
	  list-style-type:none;
	  width:100px;
	  }
	  #f1{
	     background-color:blue;
	     color:white;
	  }

	</style>

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
					<div id="f1">
					<form id="myform">
						<table>
						  
						<tr><td>Keywords:</td><td><input type="text" name="key" id="key"></td><td><p id="skill"></p></td></tr>
						<tr><td>Experience(in years):</td><td><select name="exp" id="exp">
									<option  value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select></td></tr>
						<tr><td>Location:</td><td><input type="text" name="loc" id="loc"/></td><td><p id="city"></p></td></tr>
						
						<tr><td>Job Category:</td><td><?php	 echo "<select name=\"cat\">";
				                                                         for($i=0;$arrData[$i];$i++){
										 echo "<option value=$arrData[$i]>".$arrData[$i]."</option>";
				 							 }
											  echo "</select>";?></td></tr>
									
									
						<tr><td>Expected Salary(in lakhs):</td><td><select name="sal" id="sal">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option> or more</option>
									</select></td></tr>
						<tr><td>Industries:</td><td><input type="text" name="indus" id="indus"/></td></tr>
						<tr><td>SortBy:</td><td><input type="radio"   name="frns"  id="frns" value="1">companyname</td><td>                                          <input type="radio" name="frns" id="frns"     value="2">location</td></tr>
						</table>
			           <input type="button" value="Search" name="submitsearch" id="submitsearch"/>
				   <p id="validateMsg"></p> 
				   <div id="result"></div>
				  </form>
				   
				</div> 
				   
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>SPACE<span>FOR ADS</span></h3>
							</div>
							<!--code here-->
					<ul id="search">
					
						
		   <li><a href="indexMain.php?controller=search1&function=advance">advance searh</a></li></br>
		   <li><a href="indexMain.php?controller=search1&function=quick">  quick search</a></li></br>
		   <li><a href="indexMain.php?controller=search1&function=company">search by company</a></li></br>
		   <li><a href="indexMain.php?controller=search1&function=location">search by location</a></li></br>
		   <li><a href="indexMain.php?controller=search1&function=category">search by category</a></li></br>
						</ul>
						</div>
					</div>
				</div>
			</div>

</div></div>
     <script> 
	$("#key").mouseover(function (){
	  $("#skill").text("skills,fields");
	  }).mouseout(function (){
	    
	     });
								
	$("#loc").mouseover(function (){
	 $("#city").text("delhi,noida");
	}).mouseout(function (){
	   
	   });

	
    
	
	$("#submitsearch").click(function (){
	  var str=$("#myform").serialize();
		
			$.ajax({
			url:"indexMain.php?controller=advancesearch&function=search",
			data:str,
			type:"POST",
			success:function (response){
	                  var key=$("#key").val();
        		  if(key == ''){
        		    $("#validateMsg").append("enter keywords");
        		    return false;
			  }
									
										    
      			 var location=$("#loc").val();
       			 if(location == ''){
	  		    $("#validateMsg").append(",enter location");
	  		 return false;
			 }
											    
      			 var indus=$("#indus").val();
       			 if( indus == ''){
	  		 $("#validateMsg").append(",enter industry");
	  		 return false;
			 }

      			var order=$("#frns").val();
			if(order == ''){
	  		$("#validateMsg").append("enter select sorting order");
          		return false;
	               }

		$("#result").html(response);
		
		
       	 }
			      
	});
      });
 </script>
	
<?php 
include_once 'footer.php'; 


?>

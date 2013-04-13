
<?php
/* @author 		: Prince Pandey
 * @date   		: 31-03-2013
 * @description : quicksearch result view 
 * @module		: Guest
 * @modified on : 
*/

//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>

 	<style>
	#div1,#div2,#div3,#div4,#div5,#div6,#txtActionValue
	{
	display:none;
	}
	#div7
	{
	text-align:center;
	}
	#msg{
	  color:red;
	   }
	#search
	  {
	  background-color:red;
	  list-style-type:none;
	  width:100px;
	  }
	#f1{
	   color:white;
	   background-color:blue;
	   }
	</style>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span>QUICK SEARCH</span></h2>
							</div>
							<!--code here-->
					
					<div id="f1">
					<form id="myform">
					<table>
						<tr><td><input type="button" id="btn1"  value="Keywords"></td>
						<td><input type="button"     id="btn2"  value="Experience"></td>
						<td><input type="button"     id="btn3" value="Location"></td>
						<td><input type="button"     id="btn4"  value="Job Category"></td>
						<td><input type="button"     id="btn5"  value="salary"></td>
						<td><input type="button"     id="btn6" value="company"></td></tr>
					</table>	
				<div id="div1"><p>EnterKeywords:</p><input type="text" name="keywords" id="enter1"/></div>
				<div id="div2"><p>EnterExperience:</p><input type="text" name="experience" id="enter2"/></div>
				<div id="div3"><p>EnterLocation:</p><input type="text" name="location" id="enter3"/></div>
				<div id="div4"><p>EnterJobCategory:</p><input type="text" name="category" id="enter4"/></div>
				<div id="div5"><p>EnterSalary:</p><input type="text" name="salary" id="enter5"/></div>
				<div id="div6"><p>EnterCompanyName:</p><input type="text" name="companyname" id="enter6"/></div>
				<input type="text" name="txtActionValue" id="txtActionValue" value=""/></br>
				
					
					<div id="div7">			
					<input type="button" value="Search" name="submitsearch" id="submitsearch"/></div>
					 
				   </form>
			<p id="msg"></p>
			<div id="result"></div>
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
								<h3>Search<span>Menu</span></h3>
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
		$("#btn1").click(function()
		 {
		 $("#txtActionValue").val('1');
		 $("#div1").show();
		 $("#div2").hide();
		 $("#div3").hide();
		 $("#div4").hide();
		 $("#div5").hide();
		 $("#div6").hide();
		 
		 });
		$("#btn2").click(function()
		 {
		 $("#txtActionValue").val('2');
		 $("#div1").hide();
		 $("#div2").show();
		 $("#div3").hide();
		 $("#div4").hide();
		 $("#div5").hide();
		 $("#div6").hide();
		 
		 });
		$("#btn3").click(function()
		 {
		 $("#txtActionValue").val('3');
		 $("#div1").hide();
		 $("#div2").hide();
		 $("#div3").show();
		 $("#div4").hide();
		 $("#div5").hide();
		 $("#div6").hide();
		 
		 });
		$("#btn4").click(function()
		 {
		 $("#txtActionValue").val('4');
		 $("#div1").hide();
		 $("#div2").hide();
		 $("#div3").hide();
		 $("#div4").show();
		 $("#div5").hide();
		 $("#div6").hide();
		 
		 });
		$("#btn5").click(function()
		 {
		 $("#txtActionValue").val('5');
		 $("#div1").hide();
		 $("#div2").hide();
		 $("#div3").hide();
		 $("#div4").hide();
		 $("#div5").show();
		 $("#div6").hide();
		 
		 });
		$("#btn6").click(function()
		 {
		 $("#txtActionValue").val('6');
		 $("#div1").hide();
		 $("#div2").hide();
		 $("#div3").hide();
		 $("#div4").hide();
		 $("#div5").hide();
		 $("#div6").show();
		 
		 });

		$("#submitsearch").click(function (){
		  
		    var str=$("#myform").serialize();
			
		    $.ajax({
			url:"indexMain.php?controller=quicksearch&function=search",
			data:str,
			type:"POST",
			success:function (response)
			 {
			    
			var a=$("#txtActionValue").val();
			  
			if(a == 1){
			  var key=$("#enter1").val();
			  if(key == ''){
		            $("#msg").text("enter keywords");
			    return false;
			  }if(key !==""){
			  
			  
			 }
			}

			else if(a == 2){
			   var key=$("#enter2").val();
		           if(key == ''){
			   $("#msg").text("enter experience");
			   return false;
			  }if(key !==""){
			  
			  
			 }
			}	      

					     
			else if(a == 3){
			  var key=$("#enter3").val();
			  if(key == ""){
			  $("#msg").text("enter location");
			  return false;
			 }if(key !==""){
			  
			  
			 }
			}

						     
		    else if(a == 4){
		     var key=$("#enter4").val();
		     if(key == ''){
		       $("#msg").text("enter job category");
		       return false;
		     }if(key !==""){
			 
			  
			 }
		   }


							    
		 else if(a == 5){
		   var key=$("#enter5").val();
		   if(key == ''){
		     $("#msg").text("enter salary");
		     return false;
		   }if(key !==""){
			  
			  
			 }
		}

								    
		else if(a == 6){
                  var key=$("#enter6").val();
		  if(key == ""){
                    $("#msg").text("enter companyname");
		    return false;
		  }if(key !==""){
			  
			  
			 }
		}
	      else{
		alert("none is selcted");
		return false;
	     }
	$("#result").html(response);
	  }
			      
	});
      });

		
		 /*$("#usersubmit").click(function() {
			
		     var str=$("#myform").serialize();
		     $.ajax({
			url:"indexMain.php?controller=quicksearch&function=search"method="post",
			data:str,
			type:"POST",
			success:function ()
			 {
				alert(str);
			 }
		      });
		   });*/
								
								
								</script>
							  
	<?include_once("view/dummy/footer.html");?>

</body>
</html>

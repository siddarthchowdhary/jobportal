
<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-2013
 * @description : PreviewAboutUs view 
 * @module		: Guest
 * @modified on : 
*/

//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
include_once 'header.php';
?>
<style>
	#div1
	{
	float:left;
	background-color:red;
	width:100px;
	}
	
	#div2
	{
	float:left;
	width:200px; 
	background-color:blue;
	}
	.company
	{
	float:left;
	background-color:blue;
	color:blue;
	width:200px;
	font-size:15px;
	
	}
	#search
	  {
	  background-color:red;
	  list-style-type:none;
	  width:100px;
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
					<h1>JOBS AVAILABLE IN </h1>

		<div id="div4" style="color:white;background:blue"></div>
		
		
		
		
				<div class="company"  style="color:white;background:blue">
				<a href="indexMain.php?controller=locationsearch&function=searchJobinNoida">noida</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinDelhi">delhi</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinPatna">patna</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinBanglore">banglore</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinCalcutta">calcutta</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinNewyork">newyork</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobincapetown">capetown</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinhaidrabad">haidrabad</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinIndore">indore</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinMumbai">mumbai</a></br>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinPune">pune</a></br>
				
			   	<a href="indexMain.php?controller=locationsearch&function=searchJobinPune">
				<?php //echo $arrData[0];?></a></br>
				
				</div>
				<div class="company"  style="color:white;background:blue">
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
		/*$("document").ready(function()
		 {
		$.ajax({
		 url: "../indexMain.php?controller=locationsearch&function=save",
		 type:"post",
		 success:function(data)
		 {
		  alert(data);
		 }

	     



		});
		});*/
	</script>
		
<?php 
include_once 'footer.php'; 


?>

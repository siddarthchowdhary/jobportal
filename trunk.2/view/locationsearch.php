
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
	#f1{
	   color:white;
	   background-color:blue;
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
								<h2><span>Jobs Available In</span></h2>
							</div>
							<!--code here-->
					

		
		<div id="f1">
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
	</script>
		
<?php 
include_once 'footer.php'; 


?>

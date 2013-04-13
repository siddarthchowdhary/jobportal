
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
 		<script>
 
 		</script>

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

		
				   
				<a href="indexMain.php?controller=companysearch&function=searchJobinAdobe">adobe</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinAccenrure">accenture</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinAricent">aricent</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinInfosys">infosys</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinOsscube">osscube</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinTcs">tcs</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinWipro">wipro</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinGrepcity">grepcity</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinInfotech">infotech</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinTechnohigh">technohigh</a></br>
				<a href="indexMain.php?controller=companysearch&function=searchJobinThinkinc">thinkinc</a></br>
					     
			   	<a href="indexMain.php?controller=companysearch&function=searchJobinThinkinc">
				<?php //echo $arrData[0];?></a></br>
			   
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


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
								<h3>Jobs<span>In</span></h3>
							</div>
							<!--code here-->
					<ul id="search">
					
							
     
	      <li><a href="<?php echo SITE_PATH.'indexMain.php?controller=search1&function=company';?>"> Jobs by Company </a></li></br>
              <li><a href="<?php echo SITE_PATH.'indexMain.php?controller=search1&function=location';?>">Jobs by Location </a></li></br>
              <li><a href="<?php echo SITE_PATH.'indexMain.php?controller=search1&function= category';?>">   Jobs by Category</a></li></br>
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


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
		
		
				<a href="indexMain.php?controller=categorysearch&function=searchJobinIt">IT</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinBpo">bpo </a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinKpo">kpo</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinAccount">account</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinFiance">finance</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinHr">HR</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinNetwork">network</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinDba"> DBA</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinTester">tester</a></br>
				<a href="indexMain.php?controller=categorysearch&function=searchJobinDesiner">desiner</a></br>
				
			   	<a href="indexMain.php?controller=categorysearch&function=searchJobinDesiner">
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
		$("document").ready(function()
		 {
		$.ajax({
		 url: "../indexMain.php?controller=categorysearch&function=save",
		 type:"post",
		 success:function(data)
		 {
		  alert(data);
		 }

	     



		});
		});
	</script>
	</body>
</html>

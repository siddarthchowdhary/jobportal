
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
	#page{
	 background-color:red;
	 width:50px;
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
		<?php
			
				echo "<table >";
				echo "<tr>"."<th>"."Company"."</th>"."<th>"."City"."</th>"."<th>"."Designation"."</th>"."<th>"."Category"."</th>"."</tr>";
			
				
				 foreach ($arrData as $key =>$value)
				 	{
				 		echo "<tr>";
				
				    foreach($value as $value1=>$val1)
				    {
				    	echo "<td>".$val1."</td>";
				    	
				    }
				    echo "</tr>";
				}
				echo "</table>";
				  
				?>
				
			      <div id="page">    
				<a href="indexMain.php?controller=locationsearch&function=searchJobinNoida1">page1</a>
				<a href="indexMain.php?controller=locationsearch&function=searchJobinNoida2">page2</a>
			      </div>
									     
		</div>
	    </div>
	</div>
    </div>
 </div>
</div>

		

<?php 
include_once 'footer.php'; 


?>

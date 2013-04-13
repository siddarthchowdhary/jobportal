
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
   </style>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span>Job Search Result</span></h2>
							</div>
							<!--code here-->

		   <div id="f1">
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
			 	<a href="indexMain.php?controller=search1&function=company">back to search menu</a>

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




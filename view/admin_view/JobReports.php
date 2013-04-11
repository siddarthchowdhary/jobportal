
<?php
/* @author 		: Ashwani Singh
 * @date   		: 10-04-2013
 * @description : JobReports view
 * @module 		: Admin
 * @modified on : 
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');

include_once 'header.php';
?>
<script>
function searchJobs()
{ 
	
	$.ajax({
			type 	: "POST",
			url 	: 'indexMain.php?controller=Reports&function=jobReportsSearch',
			data 	: $('#jobSearch').serialize(),
			success : function(response)
			{	
				$('#job_result').html(response);
				$("#result").show();
			}
	});
}

//function to show job stats  
$(document).ready(function() {

	$.ajax({
			type 	: "POST",
			url 	: 'indexMain.php?controller=Reports&function=jobStats',
			
			success : function(response)
			{	
				$('#job_stats').html(response);
				
			}
	});

});

$(document).ready(function(){
    $("#result").hide();
})
</script>
	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo JOB_REPORTS; ?></span></h2>
							</div>
							<!--code here-->
							<div id="job_stats" class="admin_content">
								
							</div>
							<div id="content">
								<form id="jobSearch" class="search-form" method="post" >
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="keyword">Enter keyword(s)</label>
													<span class="text">
														<input type="text" class="text" id="keywords" name="keywords"/>
													</span>
												</div>
												<div class="row">
													<label for="job-category">Select a job category</label>
													<select id="job-category" name="job-category">
														<option class="default"></option>
														<option>IT-Software</option>
														<option>IT-Hardware</option>
														<option>Finance</option>
														<option>Marketing</option>
														<option>Others</option>
													</select>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="location">Location(City)</label>
													<span class="text">
														<input type="text" class="text" id="location" name="location"/>
													</span>
												</div>
												<div class="row">
													<label for="location">Experience (enter 0 for fresher)</label>
													<span class="text">
														<input type="text" class="text" id="experience" name="experience"/>
													</span>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="employer">Company Name</label>
													<span class="text">
														<input type="text" class="text" id="employer" name="employer"/>
													</span>
												</div>
												<div class="row">
													<input type="button" value="Perform the search" class="submit" onclick="searchJobs()"/>
												</div>
											</div>
										</div>
										
									</fieldset>
								</form>

								<div id="job_result">
								
								
								</div>
								
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
								<h3>Main<span>Menu</span></h3>
							</div>
							<!--code here-->
							<div id="admin_sidebar_anchor">
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=siteStatistics';?>"><?php echo SITE_STATISTICS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=jobseekerReports';?>"><?php echo MANAGE_JOBSEEKER_REPORTS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=employerReports';?>"><?php echo MANAGE_EMP_REPORTS; ?></a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=jobReports';?>"><?php echo MANAGE_JOB_REPORTS; ?></a>
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




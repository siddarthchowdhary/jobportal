
<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : JobReports view
 * @module 		: Admin
 * @modified on : 
*/
//require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
</head>
<body>
<?php include_once 'header.php';
?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span>JOB REPORTS</span></h2>
							</div>
							<!--code here-->
							<div id="content">
								<form class="search-form" method="post" action="<?php echo SITE_PATH;?>indexMain.php?controller=Reports&function=jobReportsSearch">
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
													<input type="submit" value="Perform the search" class="submit" />
												</div>
											</div>
										</div>
										<ul class="sort-list">
											<li><a href="#">Advanced search</a></li>
											<li><a href="#">Browse by job category</a></li>
											<li><a href="#">Browse by location</a></li>
											<li><a href="#">Browse by employer</a></li>
										</ul>
									</fieldset>
								</form>

							
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
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=siteStatistics';?>">Site Statistics</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=jobseekerReports';?>">Jobseeker</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=employerReports';?>">Employer</a>
							<a href="<?php echo SITE_PATH.'indexMain.php?controller=Reports&function=jobReports';?>">Jobs</a>
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




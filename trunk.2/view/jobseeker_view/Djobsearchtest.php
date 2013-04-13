<?php #comment after merging
require ("../../config/constants.php")
;?> 
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
	<?include_once("headerjs.php");?>
<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Job<span>Search</span></h2>
								</div>
								<form class="search-form" action="jobsearchtestProcess.php">
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="keyword">Enter keyword(s)</label>
													<span class="text">
														<input type="text" class="text" id="keyword" name="keyword"/>
													</span>
												</div>
												<div class="row">
													<label for="job-category">Select a job category</label>
													<select id="job-category" name="job-category">
														<option class="default">&nbsp;</option>
														<option>Category 1</option>
														<option>Category 2</option>
													</select>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="location">Select location</label>
													<select id="location" name="location">
														<option class="default">&nbsp;</option>
														<option>Location 1</option>
														<option>Location 2</option>
													</select>
												</div>
												<div class="row">
													<label for="level">Career level</label>
													<select id="level" name="level">
														<option class="default">&nbsp;</option>
														<option>Career level 1</option>
														<option>Career level 2</option>
													</select>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="employer">Employer</label>
													<select id="employer" name="employer">
														<option class="default">&nbsp;</option>
														<option>Employer 1</option>
														<option>Employer 2</option>
													</select>
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
</div></div></div>
<?include_once("footer.html");?>

</body>
</html>

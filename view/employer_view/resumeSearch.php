
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
	<?include_once("headerEmployer.php");?>
	<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Resume<span>Search</span></h2>
								</div>
								<form class="search-form" action="indexMain.php?controller=resumeSearch&function=resumeSearch" method="post">
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
													<label for="location">Location</label>
													<select id="location" name="location">
														<option class="default">&nbsp;</option>
														<option>NOIDA</option>
														<option>Delhi</option>
													</select>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="skill">Skill</label>
													<span class="text">
														<input type="text" class="text" id="skill" name="skill"/>
													</span>
												</div>
												<div class="row">
													<label for="experience">Experience</label>
													<span class="text">
														<input type="text" class="text" name="experience" id="experience"/>
													</span>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="education">Highest Education</label>
													<select id="education" name="education">
														<option class="default">&nbsp;</option>
														<option>MCA</option>
														<option>MBA</option>
													</select>
												</div>
												<div class="row">
													<input type="submit" value="Perform the search" class="submit" />
												</div>
											</div>
										</div>
										<ul class="sort-list">
											<li><a href="#">Advanced search</a></li>
											<li><a href="#">Browse by category</a></li>
											<li><a href="#">Browse by skill</a></li>
											<li><a href="#">Browse by experience</a></li>
										</ul>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
</div></div></div>

<?php require_once 'footer.html';?>
</body>
</html>

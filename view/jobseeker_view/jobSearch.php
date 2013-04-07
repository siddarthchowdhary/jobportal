<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<script src="<?php echo JS_PATH;?>jquery.validate.pack.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH;?>scriptjobSearchjobSeeker.js" type="text/javascript"></script>
	<!--own sript for validation-->
	<!--table with formatting css-->
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<!--ajax script for result of jobsearch-->
	<script>
		$(document).ready(function(){
		$("#search").click(function(){
			//alert($("#frmJobSearch").serialize());
			$.ajax({
				type:"POST",		
				url:"<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=search", 
				data:$("#frmJobSearch").serialize(),  
				success:function(result){  
					$("#result").html(result);
				}
			});//ajax function ends here
		});//button click ends here
		});//document.ready ends here
	</script>
	
	

</head>
<body>
	<?php include_once("headerjs.php");?>
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
								<form class="search-form" id="frmJobSearch" method="get"><!--method="post" action="<?php// echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=search">-->
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
														<?php
														while (list($key,$val)=each($arrData)) {
															echo "<option>".$val."</option>";
														}
														?>
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
													<label for="location">Experience (ex:0 for fresher)</label>
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
													<input type="button" value="Perform the search" id="search" class="submit" />
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
<div id="result"></div>				
</div>
			<div id="sidebar">
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>SPACE<span>FOR ADS</span></h3>
							</div>
							<!--code here-->
						</div>
					</div>
				</div>
			</div>

</div></div>
<?include_once("footer.html");?>

</body>
</html>

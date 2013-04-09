<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php 
	//echo'<pre>';print_r(debug_backtrace());
	require_once 'config/constants.php'; //die("here");?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>      
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<!--table with formatting css-->
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<!--table with formatting js-->
	<script src="<?php echo JS_PATH.'jquery.js';?>" type="text/javascript"></script>
    <script src="<?php echo JS_PATH.'jquery.dataTables.js';?>" type="text/javascript"></script>
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
        </script>
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
								<form class="search-form" method="post" action="<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=search">
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
														while (list($key,$val)=each($arrData['category'])) {
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
				</div>         <!--search box till here-->
				
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MATCHING<span>RESULTS</span></h2>
							</div>
							<!--code here-->
							<?php ?>
							<!--data tables used here-->
                                                        <form action="<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=apply" method="post">
								<table id="datatables" class="display">
									<thead>
										<tr>	
										<th>JOBS</th>
										</tr>
									</thead>
								
									<tbody>
                                                                            <?php
                                                                            while (list($key, $val) = each($arrData['result'])) {
                                                                                echo '<tr>';
                                                                                echo '<td>';
                                                                                //print_r($val);
                                                                                echo "<br>"."<b>Name of Post :</b>".$val['name_of_post'];
                                                                                echo "<br>"."<b>Company Name :</b>".$val['company_name'];
                                                                                echo "<br>"."<b>Experience required :</b>".$val['experience_required']." years or more";
                                                                                echo "<br>"."<b>Job Description :</b>".$val['job_description'];
                                                                                echo "<br>"."<b>Job Location :</b>".$val['job_location'];
                                                                                echo "<br>"."<b>Job Category :</b>".$val['job_category'];
                                                                                echo '<input type="hidden" name="job_id" id="job_id" value="'.$val['id'].'"/>';
                                                                                echo "<br>".'<input type="submit" value="Apply"/>';
                                                                                //add a apply button here
                                                                                echo '</td>';
                                                                                echo '</tr>';
                                                                            }
                                                                            ?>
									</tbody>
								</table>
                                                        </form></div>
						</div>
					</div>
				</div>

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

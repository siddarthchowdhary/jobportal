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
	<? include_once("headerEmployer.php");?>
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
                                
								<table id="datatables" class="display">
									<thead>
										<tr>	
											<th>Resume</th>
										</tr>
									</thead>
									<tbody>
										<?php
											// echo"<pre>";print_r($arrData);die("in view");
											
											while (list($key, $val) = each($arrData)) {
                                            echo '<tr>';
                                            echo '<td>';
                                            //print_r($val);
                                            //echo '1';
                                            echo "<br>"."<b>Name :</b>".$val['displayname'];
                                            echo "<br>"."<b>highest_degree :</b>".$val['highest_degree'];
                                            echo "<br>"."<b>Job Description :</b>".$val['experience'];
                                            echo "<br>"."<b>Job Location :</b>".$val['keyskills'];
                                            echo "<br>"."<b>Job Category :</b>".$val['gender'];
                                            echo "<br>"."<b>Job Category :</b>".$val['contact_number'];
                                            //~ //echo '<input type="hidden" name="job_id" id="job_id" value="'.$val['id'].'"/>';
                                            //~ //echo "<br>".'<input type="submit" value="Apply"/>';
                                            //~ //add a apply button here
                                            echo '</td>';
                                            echo '</tr>';
                                       }
                                       ?>
                                      </tbody>
								</table>	
					</div>
					</div>
				</div></div>

</div>
			
</div>

</div>


</body>

</html>

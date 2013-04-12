

	<?php require_once VIEW_PATH."header.php";?>  <!--header included-->
	<!--table with formatting css-->
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<script src="<?php echo JS_PATH;?>jquery.validate.pack.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH;?>scriptjobSearchjobSeeker.js" type="text/javascript"></script>
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
            });
        </script>
        
	<!--script for login prompt before continiuing to apply-->
	<script>
		function fncApply(jobId)
		{
			$("#res"+jobId).html("<br><span style='color:red;'>You need to login before applying for this job.</span>");
			$("#res"+jobId).next().next().hide();
		}
	</script>
	
	
	<!--script to display newly generated results-->
	<script>
		$(document).ready(function(){
		$("#search").click(function(){
			$("#oldResults").hide();
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
								<form class="search-form" id="frmJobSearch" method="post" action="<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=search">
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="keyword"><?php echo ENTER_KEYWORDS;?></label>
													<span class="text">
														<input type="text" class="text" id="keywords" name="keywords"/>
													</span>
												</div>
												<div class="row">
													<label for="job-category"><?php echo SELECT_JOB_CATEGORY;?></label>
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
													<label for="location"><?php echo LOCATION_CITY;?></label>
													<span class="text">
														<input type="text" class="text" id="location" name="location"/>
													</span>
												</div>
												<div class="row">
													<label for="location"><?php echo EXP_WITH_EX;?></label>
													<span class="text">
														<input type="text" class="text" id="experience" name="experience"/>
													</span>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="employer"><?php echo COMPANY_NAME;?></label>
													<span class="text">
														<input type="text" class="text" id="employer" name="employer"/>
													</span>
												</div>
												<div class="row">
													<input type="button" value="Perform the search" id="search" class="submit" />
												</div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>         <!--search box till here-->
				
				<div id="result"></div>
				
				<div class="block" id="oldResults">   <!--write one block div for one box content-->
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
                                                                                echo "<br>"."<b>".NAME_OF_POST.":</b>".$val['name_of_post'];
                                                                                echo "<br>"."<b>".COMPANY_NAME.":</b>".$val['company_name'];
                                                                                echo "<br>"."<b>".EXP_REQD.":</b>".$val['experience_required']." years or more";
                                                                                echo "<br>"."<b>".JOB_DESCRIPTION.":</b>".$val['job_description'];
                                                                                echo "<br>"."<b>".JOB_LOCATION.":</b>".$val['job_location'];
                                                                                echo "<br>"."<b>".JOB_CATEGORY .":</b>".$val['job_category'];
                                                                                echo '<input type="hidden" name="job_id" id="job_id" value="'.$val['id'].'"/>';
                                                                                echo '<div id="res'.$val['id'].'"></div>';
                                                                                //~ echo "<br>".'<input type="button" value="Apply" onclick="fncApply("'.$val['id'].'")"/>';
                                                                                //add a apply button here
                                                                                echo "<br>".'<input type="button" value="Apply" class="apply" onclick="fncApply('.$val['id'].')"/>';
									
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
</div>
</div>

<?php require_once(VIEW_PATH."footer.php");?>

</body>
</html>

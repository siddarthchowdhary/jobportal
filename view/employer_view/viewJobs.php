
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery-1.7.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery.main.js';?>"></script>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script src="<?php echo JS_PATH.'jquery.js';?>" type="text/javascript"></script>
    <script src="<?php echo JS_PATH.'jquery.dataTables.js';?>" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js" ></script>
    <script type="text/javascript" src="<?php echo JS_PATH.'scriptAddNewJob.js';?>"></script>
	
	<script>
		function deleteJob(jobId)
		{
			$.ajax({
				type : "POST",
				url : 'indexMain.php?controller=job&function=deleteJob',
				data : "jobId="+jobId,
				success : function(response)
				{
					alert(response);
					location.reload();
					//$('#result').html(response);
				}
			});
		}
		function addJobForm()
		{
			$("#allJobs").toggle();
			$("#addJobForm").toggle();
		}
		
		function addJob()
		{
			$("#frmAddJob").valid();
			
			$.ajax({
				type : "POST",
				url : 'indexMain.php?controller=job&function=addNewJob',
				data : $("#frmAddJob").serialize(),
				success : function(response)
				{
					alert(response);
					if(response == 'Job Insertd Sucessfully')
						window.location.href="indexMain.php?controller=job&function=showAll";
					
				}
			});
		}
		
		$(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
                $("#addJobForm").hide();
            })
	</script>
</head>
<body>
	
	<?php
		require VIEW_PATH.'checkSession.php';
		if(isset($_SESSION['EMAIL_SESSION']))
			include_once(VIEW_PATH."employer_view/headerEmployer.php");
		else
			include_once(VIEW_PATH."header.php");
	?>

	<div id="main">
		<div class="wrapper" >
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2><span><?php echo MY_JOBS;?></span></h2>
							</div>
							<input type="button" value="<?php echo ADD_JOB;?>" onclick="addJobForm()"/>
							<div id="result"></div>
							<div id="allJobs">
							<!--data tables used here-->
                            <table id="datatables" class="display">
								<thead>
									<tr><th><?php echo MY_JOBS;?></th></tr>
								</thead>
								<tbody>
									<?php
										while (list($key, $val) = each($arrData)) {
											echo '<tr>';
											echo '<td>';
											echo '<form action="indexMain.php?controller=job&function=editJob" id="frmRegisterJobSeeker" method="post">';
											echo "<br>"."<b>".NAME_OF_POST_EMPLLOYER."</b>".$val['name_of_post'];
											echo "<br>"."<b>".DATE_OF_JOB_POSTED."</b>".$val['date_of_job_posted'];
											echo "<br>"."<b>".EXPERIENCE."</b>".$val['experience_required'];
											echo "<br>"."<b>".LAST_APPLYING_DATE."</b>".$val['date_of_last_applying'];
											echo "<br>"."<b>".JOB_DESCRIPTION_EMPLOYER."</b>".$val['job_description'];
											echo "<br>"."<b>".EXPECTED_SALARY_EMPLOYER."</b>".$val['expected_salary'];
											echo '<input type="hidden" name="jobId" id="jobId" value="'.$val['id'].'"/>';
											echo "<br>".'<input type="submit" value="'.EDIT_DETAILS_EMPLOYER.'" />';
											echo '<input type="button" value="'.DELETE.'" onclick="deleteJob('.$val['id'].')"/>';
											echo '</form>';
											echo '</td>';
											echo '</tr>';
										}
                                      ?>
                                </tbody>
							</table>	
							</div><!--id alljobs ends here-->
						
						<div id="addJobForm">
							<form action="indexMain.php?controller=job&function=addNewJob" id="frmAddJob" method="post">
							<table class="frmregisteremp">
								<tr>
									<td><label for="postName"><strong><?php echo NAME_OF_POST_EMPLLOYER;?><em>*</em></strong></label></td>
									<td><input type="text" name="postName" id="postName"></td>
								</tr>
								<tr>
									<td><label for="experience"><strong><?php echo EXPERIENCE;?> <em>*</em></strong></label></td>
									<td><input type="text" name="experience" id="experience"></td>
								</tr>
								<tr>	
									<td><label for="dateOfLastApplying"><strong><?php echo LAST_APPLYING_DATE;?> <em>*</em></strong></label></td>
									<td><input type="text" name="dateOfLastApplying" placeholder="YYYY-MM-DD" id="dateOfLastApplying"></td>
									<!--
									<td><input type="text" name="monthOfLastApplying" placeholder="month" id="monthOfLastApplying" onblur="requireValidator(this)"></td>
									<td><input type="text" name="yearOfLastApplying" placeholder="year" id="yearOfLastApplying" onblur="requireValidator(this)"></td>
									-->
								</tr>
								<tr>
									<td><label for="expectedSalary"><strong><?php echo EXPECTED_SALARY_EMPLOYER;?><em>*</em></strong></label></td>
									<td><input type="text" name="expectedSalary" id="expectedSalary"></td>
								</tr>
								<tr>
									<td><label for="jobDescription"><strong><?php echo JOB_DESCRIPTION_EMPLOYER;?><em>*</em></strong></label></td>
									<td><input type="text" name="jobDescription" id="jobDescription"></td>
								</tr>
								<tr>
									<td><label for="jobLocation"><strong><?php echo JOB_LOCATION;?> <em>*</em></strong></label></td>
									<td><input type="text" name="jobLocation" id="jobLocation"></td>
								</tr>
								<tr>
									<td><label for="jobCategory"><strong><?php echo JOB_CATEGORY;?> <em>*</em></strong></label></td>
									<td><input type="text" name="jobCategory" id="jobCategory"></td>
								</tr>
								<tr>
									<td><label for="keywords"><strong><?php echo ENTER_KEYWORDS;?> <em>*</em></strong></label></td>
									<td><input type="text" name="keywords" id="keywords"></td>
								</tr>
								<tr>
									<td><input type="button" value="Submit" onclick="addJob()" /></td>
									<td><input type="reset" /></td>
								</tr>
							</table>
							</form>
						</div><!--id addjobs ends here-->
					</div>
				</div>
			</div>                 <!--one block till here-->
		</div>
		<div id="sidebar">
			<div class="block">   <!--write one block div for one box content-->
				<div class="holder">
					<div class="frame">
						<div class="title">
							<h3>MY<span>SIDEBAR</span></h3>
						</div>
						<!--code here-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<?include_once("footer.html");?>

</body>
</html>

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
        <!--script for job result after applying the job-->
    	<script>
			function jobApply(jobId)
			{
				$.ajax({
				type:"POST",		
				url:"<?php echo SITE_PATH;?>indexMain.php?controller=jobsearch&function=apply", 
				data:"job_id="+jobId,  
				success:function(result){  
					$("#res"+jobId).html("<br>"+result);
					$("#res"+jobId).next().next().hide();
				}
				});
			}
	</script>    
    	
<div class="block">   <!--write one block div for one box content-->
	<div class="holder">
		<div class="frame">
			<div class="title">
				<h2>MATCHING<span>RESULTS</span></h2>
			</div>
				<!--code here-->
				<!--data tables used here-->
				<form id="frmResult" >
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
									
									echo "<br>"."<b>".NAME_OF_POST .":</b>".$val['name_of_post'];
									echo "<br>"."<b>".COMPANY_NAME .":</b>".$val['company_name'];
									echo "<br>"."<b>".EXP_REQD.":</b>".$val['experience_required']." years or more";
									echo "<br>"."<b>".JOB_DESCRIPTION." :</b>".$val['job_description'];
									echo "<br>"."<b>".JOB_LOCATION. ":</b>".$val['job_location'];
									echo "<br>"."<b>".JOB_CATEGORY.":</b>".$val['job_category'];
									echo '<input type="hidden" name="job_id" class="job_id" value="'.$val['id'].'"/>';
									echo '<div id="res'.$val['id'].'"></div>';
									echo "<br>".'<input type="button" value="Apply" class="apply" onclick="jobApply('.$val['id'].')"/>';
									
									echo '</td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
                </form>
		</div>
	</div>
</div>

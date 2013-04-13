
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'style.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script src="<?php echo JS_PATH.'jquery.js';?>" type="text/javascript"></script>
    <script src="<?php echo JS_PATH.'jquery.dataTables.js';?>" type="text/javascript"></script>
    
    
	<script type="text/javascript">
		var flag = 0;
		function performSearch()
		{
			$.ajax({
				type : "POST",
				url : 'indexMain.php?controller=resumeSearch&function=resumeSearch',
				data : $("#resumeSearchForm").serialize(),
				success : function(response)
				{
					$("#searchResult").html(response);
					if(flag==0)
					{
						$('#datatables').dataTable({
							"sPaginationType":"full_numbers",
							"aaSorting":[[2, "desc"]],
							"bJQueryUI":true
						});
						flag = 1;
					}
					$("#divresult").show();
					
				}
			});
		}
		
		function contactDetails(data)
		{
			alert(data);
		}
		$(document).ready(function(){
			$("#divresult").hide();
			
			
        })
	</script>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['EMAIL_SESSION']))
			include_once(VIEW_PATH."employer_view/headerEmployer.php");
		else
			include_once(VIEW_PATH."header.php");
	?>
	
	<script src="<?php echo JS_PATH.'jquery.dataTables.js';?>" type="text/javascript"></script>
	<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2><span><?php echo SEARCH_RESUME;?></span></h2>
								</div>
								<form class="search-form" id="resumeSearchForm" action="" method="post">
									<fieldset>
										<div class="columns-holder">
											<div class="column">
												<div class="row">
													<label for="keyword"><?php echo ENTER_KEYWORDS;?></label>
													<span class="text">
														<input type="text" class="text" id="keyword" name="keyword"/>
													</span>
												</div>
												<div class="row">
													<label for="location"><?php echo LOCATION;?></label>
													<span class="text">
														<input type="text" class="text" id="location" name="location"/>
													</span>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="skill"><?php echo SKILL;?></label>
													<span class="text">
														<input type="text" class="text" id="skill" name="skill"/>
													</span>
												</div>
												<div class="row">
													<label for="experience"><?php echo EXPERIENCE;?></label>
													<span class="text">
														<input type="text" class="text" name="experience" id="experience"/>
													</span>
												</div>
											</div>
											<div class="column">
												<div class="row">
													<label for="education"><?php echo HIGHEST_EDUCATION;?></label>
													<span class="text">
														<input type="text" class="text" name="highestEducation" id="highestEducation"/>
													</span>
												</div>
												<div class="row">
													<input type="button" onclick="performSearch()" value="<?php echo PERFORM_THE_SEARCH;?>" class="submit" />
												</div>
											</div>
										</div>
										
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div><!--blocks ends here-->
				<div class="block" id="divresult">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Resume<span><?php echo SEARCH_RESULT;?></span></h2>
								</div>
					<table id="datatables" class="display">
						<thead>
							<tr><th><?php echo SEARCH_RESULT;?></th></tr>
						</thead>
						<tbody id="searchResult">
							
						</tbody>
					</table>
				</div><!--divresult ends here-->
				</div></div></div>
			</div>
		</div>
	</div>
<?include_once("footer.php");?>

</body>
</html>

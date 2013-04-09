
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
    
    
	<script>
		function performSearch()
		{
			//alert($("#resumeSearchForm").serialize());
			
			$.ajax({
				type : "POST",
				url : 'indexMain.php?controller=resumeSearch&function=resumeSearch',
				data : $("#resumeSearchForm").serialize(),
				success : function(response)
				{
					//alert(response);
					$("#searchResult").html(response);
					$('#datatables').dataTable({
						"sPaginationType":"full_numbers",
						"aaSorting":[[2, "desc"]],
						"bJQueryUI":true
					});
					$("#divresult").show();
					
				}
			});
		}
		$(document).ready(function(){
			$("#divresult").hide();
			
        })
	</script>
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
								<form class="search-form" id="resumeSearchForm" action="" method="post">
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
													<span class="text">
														<input type="text" class="text" id="location" name="location"/>
													</span>
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
													<span class="text">
														<input type="text" class="text" name="highestEducation" id="highestEducation"/>
													</span>
												</div>
												<div class="row">
													<input type="button" onclick="performSearch()" value="Perform the search" class="submit" />
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
				</div><!--blocks ends here-->
				<div class="block" id="divresult">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Resume<span>Search Results</span></h2>
								</div>
					<table id="datatables" class="display">
						<thead>
							<tr><th>Search Result</th></tr>
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

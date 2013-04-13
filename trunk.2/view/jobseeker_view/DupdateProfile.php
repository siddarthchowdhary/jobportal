<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="../../css/stylejs.css" />
	<script type="text/javascript" src="../../js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.main.js"></script>
</head>
<body>
	<?require ("../../config/constants1.php")?>
	<?include_once("headerjs.html");?>

	<div id="main">
		<div class="container">
		
			<div class="personal">
				<div class="title">
						<h2>Personal<span>Details</span></h2>
				</div>
				<form class="search-form" action="#">
					<fieldset>
							<div class="columnL">
								<div class="row">
									<?php echo FNAME ;?>
								</div>
								<div class="row">
									<?php echo MNAME ;?>
								</div>
								<div class="row">
									<?php echo LNAME ;?>
								</div>
								<div class="row">
									<?php echo GENDER ;?>
								</div>
								<div class="row">
									<?php echo DOB;?>
								</div>
								
								<div class="row">
									<input type="submit" value="Update My Details" class="submit" />
								</div>
							</div>
							<div class="columnR">
								<div class="row">
									<span class="text"><input type="text" class="text" id="fname"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" id="mname"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" id="lname"/></span>
								</div>
								<div class="row">
									<select id="job-category">
										<option class="default"></option>
										<option>MALE</option>
										<option>FEMALE</option>
									</select>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" id="dob"/></span>
								</div>
								
								<div class="row">
									<input type="reset" value="Reset The Values" class="submit" />
								</div>
							</div>

						</div>				
					</fieldset>
				</form>
				
			</div>

			
		

		</div>
	</div>
	<?include_once("footer.html");?>

</body>
</html>

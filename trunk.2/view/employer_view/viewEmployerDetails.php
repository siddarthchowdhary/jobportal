<?php #comment after merging
//require_once ("config/constants.php");?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php
               ini_set("display_errors","1");
               ini_set( 'error_reporting', "E_ALL" );
               require_once 'config/constants.php';
               //echo "correct path here";
       ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery-1.7.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo JS_PATH.'jquery.main.js';?>"></script>
</head>
<body>
	<?include_once("headerEmployer.php");?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY <span>DETAILS</span></h2>
							</div>
							<?php echo '<pre>';
							if(isset($arrData))
								print_r($arrData);?>
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

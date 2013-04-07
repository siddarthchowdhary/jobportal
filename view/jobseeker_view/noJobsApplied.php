<?php
//@author    : Siddarth Chowdhary
//created on : 1 April 2013
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="holder">
				<h1 class="logo"><a href="">Job Portal</a></h1>
			</div>
		</div>
	</div>

	<div id="main">
		<div class="wrapper">
                    <h2>You have not applied for any jobs yet.</h2>
                    <br><br><br><br>
                                    <a style="color:blue;" href="indexMain.php?controller=pages&function=jobsearch"><h3>Continue Searching Jobs ??</h3></a>
                </div>
        </div>
	<?include_once("footer.html");?>

</body>
</html>

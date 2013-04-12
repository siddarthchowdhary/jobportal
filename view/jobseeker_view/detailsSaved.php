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
	<?php require_once(VIEW_PATH."jobseeker_view/headerjs.php");?>
	<div id="main">
		<div class="wrapper">
                    <h2><?php echo DETAILS_SAVED;?></h2>
                    <br><br><br><br>
                </div>
        </div>
	<?php require_once(VIEW_PATH."footer.php");?>

</body>
</html>

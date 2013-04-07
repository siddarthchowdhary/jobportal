<?php #comment after merging
require ("../../config/constants.php")
;?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'stylejs.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
</head>
<body>
	<?include_once("headerEmployer.php");?>
		<div id="main">
		<div class="wrapper" style="height:300px;">
			<span><h3>Change Password :</h3></span>
        <div id="frmChangePassword" >
        <form action="indexMain.php?controller=" id="frmChangePassword" method="post">
            <table class="frmChangePassword">

                <tr>
                    <td><label for="currentPassword"><strong>Current Password: <em>*</em></strong></label></td>
                    <td><input type="text" name="currentPassword" id="currentPassword" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="newPassword"><strong>New Password: <em>*</em></strong></label></td>
                    <td><input type="text" name="newPassword" id="newPassword" onblur="requireValidator(this)"></td>
                </tr>
                <tr>
                    <td><label for="confirmPassword"><strong>Confirm Password: <em>*</em></strong></label></td>
                    <td><input type="text" name="confirmPassword" id="confirmPassword" onblur="requireValidator(this)"></td>
                </tr>
            </table>
            <div class="row">
				<input type="submit" value="Change Password" class="submit" />
			</div>
         </form>
         </div></div></div>
         <?include_once("footer.html");?>
</body>
</html>

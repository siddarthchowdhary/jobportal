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
	<?include_once("headerjs.php");?>

	<div id="main">
		<div class="wrapper">
			<div id="content">		
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY PERSONAL<span>DETAILS</span></h2>
							</div>
							<!--code here-->
							<?php if(!empty($arrData[0])) {?>
							<table class="tblViewDetails">
							<tr>
								<td><?php echo FNAME;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['firstname']?></td>
							</tr>
							<tr>
								<td><?php echo MNAME;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['middlename']?></td>
							</tr>
							<tr>
								<td><?php echo LNAME;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['lastname']?></td>
							</tr>
							<tr>
								<td><?php echo GENDER;?></td>
								<td> : </td>
								<td><?php if(!empty($arrData[0]['gender'])){if ($arrData[0]['gender'] == '10') {echo 'Male';} else {echo 'Female';}}?></td>
							</tr>
							<tr>
								<td><?php echo DOB;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['date_of_birth']?></td>
							</tr>
							<tr>
								<td><?php echo PHNO;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['contact_number']?></td>
							</tr>
							<tr>
								<td><?php echo PADDRESS;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['permanent_address']?></td>
							</tr>
							<tr>
								<td><?php echo CADDRESS;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['current_address']?></td>
							</tr>
							<tr>
								<td><?php echo CITY;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['current_city']?></td>
							</tr>
							<tr>
								<td><?php echo STATE;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['current_state']?></td>
							</tr>
							<tr>
								<td><?php echo COUNTRY;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['country']?></td>
							</tr>
							<tr>
								<td><?php echo PINCODE;?></td>
								<td> : </td>
								<td><?php echo $arrData[0]['pincode']?></td>
							</tr>
							</table>
							<?php } else echo NO_DETAILS;?>
						</div>
					</div>
				</div>                 <!--one block till here-->
				
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY EDUCATIONAL<span>DETAILS</span></h2>
							</div>
							<!--code here-->
							<?php if(!empty($arrData[1])) {?>
							<table class="tblViewDetails">
							<tr>
								<td><?php echo HIGHEST_DEGREE;?></td>
								<td> : </td>
								<td><?php echo $arrData[1]['highest_degree']?></td>
							</tr>
							<tr>
								<td><?php echo GRADUATION;?></td>
								<td> : </td>
								<td><?php echo $arrData[1]['graduation_degree']?></td>
							</tr>
							<tr>
								<td><?php echo PG;?></td>
								<td> : </td>
								<td><?php echo $arrData[1]['post_graduation_degree']?></td>
							</tr>
							<tr>
								<td><?php echo PHD;?></td>
								<td> : </td>
								<td><?php echo $arrData[1]['PhD']?></td>
							</tr>
							<tr>
								<td><?php echo OTHER_QUAL;?></td>
								<td> : </td>
								<td><?php echo $arrData[1]['other_degree']?></td>
							</tr>
							</table>
							<?php } else echo NO_DETAILS;?>
						</div>
					</div>
				</div>              <!--one block till here-->

                <div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY PROFESSIONAL<span>DETAILS</span></h2>
							</div>
							<!--code here-->
							<?php if(!empty($arrData[2])) {?>
							<table class="tblViewDetails">
							<tr>
								<td><?php echo EXP;?></td>
								<td> : </td>
								<td><?php echo $arrData[2]['experience']?></td>
							</tr>
							<tr>
								<td><?php echo KEY_SKILLS;?></td>
								<td> : </td>
								<td><?php echo $arrData[2]['keyskills']?></td>
							</tr>
							<tr>
								<td><?php echo INDUSTRY;?></td>
								<td> : </td>
								<td><?php echo $arrData[2]['current_industry']?></td>
							</tr>
							<tr>
								<td><?php echo FUNCTIONAL_AREA;?></td>
								<td> : </td>
								<td><?php echo $arrData[2]['functional_area']?></td>
							</tr>
							</table>
							<?php } else echo NO_DETAILS;?>
						</div>
					</div>
				</div>                <!--one block till here-->
				<div class="block">   <!--write one block div for one box content-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h2>MY<span>Resume</span></h2>
							</div>
							<!--code here-->
							<?php if ($arrData[3]['extension']=='') {
									echo "No Resume uploaded yet.";
								} else {
							?>
							<a style="color:blue;" href="uploads/<?php echo $_SESSION['EMAIL_SESSION'].".".$arrData[3]['extension']?>">My Resume</a>
							<br>Last Updated on : <?php echo $arrData[3]['last_updated_on'];?>
						<?php } ?>
						</div>
					</div>
				</div>


			</div>



		<div id="sidebar">
			
			<div class="block">    <!--advertisement-->
					<div class="holder">
						<div class="frame">
							<div class="title">
								<h3>Top<span>employers</span></h3>
							</div>
							<div class="area">
								<ul class="sponsors-list">
									<li><a href="#"><img src="images/sponsor-logo-01.jpg" alt="image description" width="66" height="25" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-02.jpg" alt="image description" width="66" height="47" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-03.jpg" alt="image description" width="66" height="34" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-04.jpg" alt="image description" width="66" height="34" /></a></li>
									<li><a href="#"><img src="images/sponsor-logo-05.jpg" alt="image description" width="66" height="33" /></a></li>
								</ul>
								<ul class="partners-list">
									<li><a href="#"><img src="images/partner-logo-01.jpg" alt="image description" width="84" height="21" /></a></li>
									<li><a href="#"><img src="images/partner-logo-02.jpg" alt="image description" width="64" height="24" /></a></li>
									<li><a href="#"><img src="images/partner-logo-03.jpg" alt="image description" width="56" height="32" /></a></li>
									<li><a href="#"><img src="images/partner-logo-04.jpg" alt="image description" width="88" height="37" /></a></li>
									<li><a href="#"><img src="images/partner-logo-05.jpg" alt="image description" width="74" height="18" /></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> <!--advertisement till here-->
			
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
	
	<?php require_once(VIEW_PATH."footer.php");?>
</div>
</body>
</html>

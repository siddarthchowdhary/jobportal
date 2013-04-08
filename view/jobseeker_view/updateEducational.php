<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'stylejs.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js" ></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'scriptUpdateJobSeekerEducational.js';?>></script>
	<script>
		function checkValueHighestDegree(val)
		{
    			if(val==="others")
       			document.getElementById('highestDegree').style.display='block';
    			else
       			document.getElementById('highestDegree').style.display='none'; 
		}

		function checkValueGraduation(val)
		{
    			if(val==="others")
       			document.getElementById('grad').style.display='block';
    			else
       			document.getElementById('grad').style.display='none'; 

		}
	</script>
	<!--ajax script for result of update educational-->
	<script>
		$(document).ready(function(){
		$("#update").click(function(){
			$("#frmUpdateEducational").valid();
			$.ajax({
				type:"POST",		
				url:"<?php echo SITE_PATH;?>indexMain.php?controller=updatejobseeker&function=educational", 
				data:$("#frmUpdateEducational").serialize(),  
				success:function(result){  
					alert(result);
					//redirect to view details page here if needed
				}
			});//ajax function ends here
		});//button click ends here
		});//document.ready ends here
	</script>
</head>
<body>

	<?include_once("headerjs.php");?>

	<div id="main">
		<div class="container">
		
			<div class="personal">
				<div class="title">
						<h2>Educational<span>Details</span></h2>
				</div>
				<form class="search-form" id="frmUpdateEducational" method="post">
					<fieldset>
							<div class="columnL">
								<div class="row">
									<?php echo HIGHEST_DEGREE ;?>
								</div>
								<div class="row">
									<?php echo GRADUATION ;?>
								</div>
								<div class="row">
									<?php echo PG ;?>
								</div>
								<div class="row">
									<?php echo PHD ;?>
								</div>
								<div class="row">
									<?php echo OTHER_QUAL;?>
								</div>
								
								<div class="row">
									<input type="button" id="update" value="Update My Details" class="submit" />
								</div>
							</div>
							<div class="columnR">
								<?php //print_r($arrData);?>
								<div class="row">
									<select name="highestDegree" onchange='checkValueHighestDegree(this.value)'> 
    										<option></option>
    										<?php if (!empty($arrData['highest_degree'])) {  ?> 
    										<option value="<?php echo $arrData['highest_degree']?>" selected = "selected"><?php echo $arrData['highest_degree']?></option>  
    									<?php } ?>  
    										<option value="MCA">MCA</option>
    										<option value="MBA">MBA</option>
										<option value="MTECH">MTECH</option>
    										<option value="others">others</option>
									</select> 
									<input type="text" name="txthighestDegree" id="highestDegree" style="display: none;"/>
								</div>
								<div class="row">
								
									<select name="grad" onchange='checkValueGraduation(this.value)'>
										<option></option>
										<?php if (!empty($arrData['graduation_degree'])) {  //default combo box value?> 
    										<option value="<?php echo $arrData['graduation_degree']?>" selected = "selected"><?php echo $arrData['graduation_degree']?></option>  
    									<?php } ?>
    										<option value="BA">BA</option>
    										<option value="BCOM">BCOM</option>
											<option value="BCA">BCA</option>
											<option value="BCA">BBA</option>
    										<option value="others">others</option>
									</select> 
									<input type="text" name="txtgrad" id="grad" name="grad" style="display: none;"/>
	
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="pg" value="<?php echo $arrData['post_graduation_degree'];?>" id="pg"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="phd" value="<?php echo $arrData['PhD'];?>" id="phd"/></span>
								</div>
								<div class="row">
									<span class="text"><input type="text" class="text" name="otherQual" value="<?php echo $arrData['other_degree'];?>" id="otherQual"/></span>
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

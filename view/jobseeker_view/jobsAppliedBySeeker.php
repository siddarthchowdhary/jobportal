<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JobBoardTemplate</title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'stylejs.css';?>" />
	<!--style for table-->
	<!--table with formatting css-->
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'demo_table_jui.css';?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'jquery-ui-1.8.4.custom.css';?>" />
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery-1.7.1.min.js';?>></script>
	<script type="text/javascript" src=<?php echo JS_PATH.'jquery.main.js';?>></script>
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
</head>
<body>

	<?include_once("headerjs.php");?>

	<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Jobs<span>Applied by Me</span></h2>
								</div>  
								<!--code here-->
							<?php ?>
							<!--data tables used here-->
								<table id="datatables" class="display">
									<thead>
										<tr>	
										<th><?php echo NAME_OF_POST;?></th>
										<th><?php echo COMPANY_NAME;?></th>
										<th><?php echo LOCATION;?></th>
										</tr>
									</thead>
								
									<tbody>
											<?php   
											//echo'<pre>';print_r($arrData);
											while (list($key, $val) = each($arrData)) {
												echo '<tr>';
												echo '<td>';
												echo $val['name_of_post'];
												echo '</td><td>';
												echo $val['company_name'];
												echo '</td><td>';
												echo $val['job_location'];
												echo '</td>';
												echo '</tr>';
											} 
											?>
									</tbody>
								</table>    
							</div>   <!--block content division ends here-->
						</div>   <!--frame division ends here-->
					</div>   <!--holder division ends here-->
				</div>    <!--block division ends here-->
			</div>    <!--content division ends here-->
		</div>    <!--wrapper division ends here-->
	</div>     <!--main division ends here-->
			
		

		</div>
	</div>
	<?include_once("footer.html");?>

</body>
</html>

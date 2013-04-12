<script>
	function registerCompany()
	{
		$("#frmRegisterCompany").valid();
		$.ajax({
                type:"POST",       
                url:"<?php echo SITE_PATH;?>indexMain.php?controller=registerCompany&function=registerCompanyProcess",
                data:$("#frmRegisterCompany").serialize(), 
                success:function(result){ 
					alert(result);
				}
		});
	}
</script>

<?php	require_once VIEW_PATH.'header.php'; ?>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js" ></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>scriptRegisterCompany.js" ></script>
	<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2>Register<span>Company</span></h2>
								</div>
								<div id="company">
									<span><h3>Basic Registration  - Company</h3></span>
									<form action="" id="frmRegisterCompany" method="post">
									<table class="frmregisteremp">
										<tr>
											<td><label for="companyName"><strong>Company Name: <em>*</em></strong></label></td>
											<td><input type="text" name="companyName" id="companyName" ></td>
										</tr>
										<tr>
											<td><label for="website"><strong>Website: <em>*</em></strong></label></td>
											<td><input type="text" name="website" id="website" ></td>
										</tr>
										<tr>
											<td><label for="IndustryType"><strong>Industry Type: <em>*</em></strong></label></td>
											<td>
												<select id="industryType" name="industryType">
													<option class="default">Select..</option>
													<?php
														while (list($key,$val)=each($arrData)) {
															echo "<option>".$val."</option>";
														}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td><label for="keyFunctionalArea"><strong>Key Functional Area: <em>*</em></strong></label></td>
											<td><input type="text" name="keyFunctionalArea" id="keyFunctionalArea" ></td>
										</tr>
										<tr>
											<td><label for="City"><strong>City: <em>*</em></strong></label></td>
											<td><input type="text" name="city" id="city" ></td>
										</tr>
										<tr>
											<td><label for="country"><strong>Country: <em>*</em></strong></label></td>	
											<td><input type="text" name="country" id="country" ></td>
										</tr>
										<tr>
											<td><input type="button" value="Register" onclick="registerCompany()"></td>
											<td><input type="reset"></td>
										</tr>	
									</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

									
<?php	require_once VIEW_PATH.'footer.php';?>

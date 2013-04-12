<script>
	function registerCompany()
	{
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
	<div id="main">
		<div class="wrapper">
			<div id="content">
				<div class="block">
					<div class="holder">
						<div class="frame">
							<div class="block-content">
								<div class="title">
									<h2><?php echo COMPANY;?><span><?php echo REGISTER;?></span></h2>
								</div>
								<div id="company">
									
									<form action="" id="frmRegisterCompany" method="post">
									<table class="frmregisteremp">
										<tr>
											<td><label for="companyName"><strong><?php echo COMPANY_NAME;?> <em>*</em></strong></label></td>
											<td><input type="text" name="companyName" id="companyName" ></td>
										</tr>
										<tr>
											<td><label for="website"><strong><?php echo WEBSITE;?> <em>*</em></strong></label></td>
											<td><input type="text" name="website" id="website" ></td>
										</tr>
										<tr>
											<td><label for="IndustryType"><strong><?php echo INDUSTRY_TYPE;?> <em>*</em></strong></label></td>
											<td>
												<select id="industryType" name="industryType">
													<option class="default"><?php echo SELECT_EMPLOYER;?></option>
													<?php
														while (list($key,$val)=each($arrData)) {
															echo "<option>".$val."</option>";
														}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td><label for="keyFunctionalArea"><strong><?php echo KEY_FUNCTIONAL_AREA;?> <em>*</em></strong></label></td>
											<td><input type="text" name="keyFunctionalArea" id="keyFunctionalArea" ></td>
										</tr>
										<tr>
											<td><label for="City"><strong><?php echo CITY_EMPLOYER;?> <em>*</em></strong></label></td>
											<td><input type="text" name="city" id="city" ></td>
										</tr>
										<tr>
											<td><label for="country"><strong><?php echo COUNTRY_EMPLOYER;?> <em>*</em></strong></label></td>	
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

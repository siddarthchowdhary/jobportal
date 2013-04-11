<?php
require_once 'DBConnect.php';
class registerCompanyModel extends DBConnect
{
	function inject($dataFromUser)
	{
		$db=$this->common();
		$data = array(
					"company_name"=>"$dataFromUser['companyName']",
					);
	}
}
?>

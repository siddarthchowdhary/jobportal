<?php
class registerCompanyController extends common
{
	function registerCompanyForm()
	{
		$result = $this->loadModel('selectValues','industryType');
		$this->loadView('employer_view/registerCompany.php',$result);
	}
	
	function registerCompanyProcess()
	{
		$data = array();
		$data = array(
					"companyName"=>"$_POST['companyName']",
					"website"=>"$_POST['website']",
					"industryType"=>"$_POST['industryType']",
					"keyFunctionalArea"=>"$_POST['keyFunctionalArea']",
					"city"=>"$_POST['city']",
					"country"=>"$_POST['country']"
					);
		$result=$this->loadmodel('registerCompany','inject',$data);
		
	}
}
?>

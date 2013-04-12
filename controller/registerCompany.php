<?php
class registerCompanyController extends common
{
	function registerCompanyForm()
	{
		//die("here");
		$result = $this->loadModel('selectValues','industryType');
		$this->loadView('employer_view/registerCompany.php',$result);
	}
	
	function registerCompanyProcess()
	{
		//$industryType = $_POST['industryType'];
		if($_POST['industryType']=='itConsultant')
			$industryType = 4;
		if($_POST['industryType']=='software_development')
			$industryType = 5;
		if($_POST['industryType']=='networking')
			$industryType = 6;
		if($_POST['industryType']=='finance')
			$industryType = 7;
		if($_POST['industryType']=='-databaseConsultant')
			$industryType = 8;
		if($_POST['industryType']=='domainManagement')
			$industryType = 9;
		
		$data = array();
		$data = array(
					"companyName"=>$_POST['companyName'],
					"website"=>'http://'.$_POST['website'],
					"industryType"=>$industryType,
					"keyFunctionalArea"=>$_POST['keyFunctionalArea'],
					"city"=>$_POST['city'],
					"country"=>$_POST['country']
					);
		$result=$this->loadmodel('registerCompany','inject',$data);
		if ($result==1)
			echo "Comapny sucessfully registered with name ".$_POST['companyName'];
		elseif($result === 0)
			echo "Something went wrong";
		else
			echo $result;
	}
}
?>

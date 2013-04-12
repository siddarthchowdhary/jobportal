<?php
require_once 'DBConnect.php';
class registerCompanyModel extends DBConnect
{
	function inject($dataFromUser)
	{
		$errMsg=array();
		if (require_once 'library/serverValidation.class.php')
		{
			$obj = new serverValidation();
			$tempDataHolder = '';
			$tempDataHolder = str_replace(' ','',$dataFromUser['companyName']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Company name should be alphabetic only.';
			
			if(($obj->validateUrl($dataFromUser['website']))==0)
				$errMsg[]='Invalid Website Format.Ex: www.example.com';
			
			$tempDataHolder = str_replace(',','',$dataFromUser['keyFunctionalArea']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Key Functional area should be alphabetic only.';
				
			$tempDataHolder = str_replace(' ','',$dataFromUser['city']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='City should be alphabetic only.';
			
			$tempDataHolder = str_replace(' ','',$dataFromUser['country']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Country should be alphabetic only.';
			
		}
		else
		{
			$errMsg[]="File Not Found";
		}
		if(empty($errMsg))
		{	
			$db=$this->common();
			$data = array(
						"company_name"=>$dataFromUser['companyName'],
						"website"=>$dataFromUser['website'],
						"industry_type"=>$dataFromUser['industryType'],
						"key_functional_area"=>$dataFromUser['keyFunctionalArea'],
						"creation_date"=>date("Y-m-d H:i:s"),
						"city"=>$dataFromUser['city'],
						"country"=>$dataFromUser['country'],
						);
			$result=$db->insert('company_details',$data);
			if ($result)
				return 1;
			else
				return 0;
		}
		/*If validation fails*/
		else
		{
			$errString='';
			foreach ($errMsg as $key => $val) 
			{
				$errString .= $val.'  ';
			}
			return $errString;
		}
	}
}
?>

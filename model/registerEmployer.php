<?php 
class registerEmployerModel 
{
	public function getDatabaseHandler()
	{
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
	}
	
	function validate($dataFromUser)
	{
		$errMsg=array();
		if (require_once 'library/serverValidation.class.php')
		{
			
			$obj = new serverValidation();
			$tempDataHolder = '';
			$tempDataHolder = str_replace(' ','',$dataFromUser['displayName']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='First name or last name should be alphabetic only.';
			
			if(($obj->emailValidation($dataFromUser['email']))==0)
				$errMsg[]='Email is not correct.';
			
			$tempDataHolder = str_replace(' ','',$dataFromUser['companyName']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)	
				$errMsg[]='Company name should be alphabetic only.';
			
			$tempDataHolder = str_replace('-','',$dataFromUser['contactNumber']);
			if(($obj->numericValidation($tempDataHolder))==0)	
				$errMsg[]='Contact Number should be numeric only.';	
			
			if(($obj->lengthValidator($dataFromUser['password'],6)==0))	
				$errMsg[]='Password should not be less than 6 characters.';
			
			return $errMsg;	
		}
		
		else
		{
			$abc[]="File not found";
		}
	}



	/*
	 * This function inserts data of new employer in database.
	 */

	function inject($dataFromUser)
	{
		$db = $this->getDatabaseHandler();
		
		$password=md5($dataFromUser['password']);
		$data = array(
					"password"=>$password,
					"displayname"=>$dataFromUser['displayName'],
					"email"=>$dataFromUser['email'],
					"usertype"=>3,
					"creation_date"=>date("Y-m-d H:i:s"),
					"status"=>1
					);
		$result=$db->insert('users',$data);
		//var_dump($result);
		
		$data = array();
		$data['tables']='users';
		$data['columns']=array('users.id');
		$data['conditions']=array("email"=>$dataFromUser['email']);
		$result = $db->select($data);
		$userId =$result->fetch(PDO::FETCH_NUM);
		//echo $userId[0];
			
		$data['tables']='company_details';
		$data['columns']=array('company_details.id');
		$data['conditions']=array("company_name"=>$dataFromUser['companyName']);
		$result = $db->select($data);
		$companyId =$result->fetch(PDO::FETCH_NUM);
		//echo $companyId[0];die();
		//echo $dataFromUser['gender'];die();
		
		$data = array(
					"user_id"=>$userId[0],
					"contact_number"=>$dataFromUser['contactNumber'],
					"company_id"=>$companyId[0],
					"gender"=>$dataFromUser['gender']
					);
		$result=$db->insert('employer_details',$data);
		
		$string1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$string2='1234567890~!@#$%^&*';
		$string=$string1.$string2;
		$string= str_shuffle($string);
		$validationString =  substr($string,0,25);
		
		$data = array(
					"user_id"=>$userId[0],
					"validation_string"=>$validationString
					);
		$result = $db->insert('inactive_users',$data);
		//return (var_dump($result));
		if($result)
			return $data;
		else
			return 0;
	}
	
	function validateEmail($data)
	{
		$userId = $data['user_id'];
		$validationString=$data['validation_string'];
		$db = $this->getDatabaseHandler();
		$data = array();
		$data['tables'] = 'inactive_users';
		$data['columns']= array('inactive_users.validation_string');
		$data['conditions']= array(
								"user_id"=>$userId,
								"validation_string"=>$validationString
								);
		$result = $db->select($data);
		//return $result;
		if ( $result->rowCount() == 1 ) {
			$data = array('status'=>0);
			$where = array('id'=>$userId);
			$result = $db->update('users',$data,$where);
			//return $result;
			if($result)
				return 1;
			else
				return 0;
		}
		else
		{
			header('location: indexMain.php');
		}
	}
}//Class end here
?>

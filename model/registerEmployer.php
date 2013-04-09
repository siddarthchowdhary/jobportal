<?php 
//ini-set("display_errors","1");
//~ require_once'library/database/usage.class.php';
//~ require_once'library/serverValidation.class.php';
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
	/*This function calls methods to validate new employer registration data
	 * and inserts the data using users class.
	 */
	function inject($dataFromUser)
	{
		$valid = 1;//echo $valid;die();
		$db = $this->getDatabaseHandler();
		
		/**
		 * If all elements are valid insert the data
		 */
		if($valid)
		{
			$displayName=$dataFromUser['firstName']." ".$dataFromUser['lastName'];
			$displayName=htmlentities($displayName);
			//echo $displayName;die("displayname");
			$password=md5($dataFromUser['password']);
			$data = array(
						"password"=>$password,
						"displayname"=>$displayName,
						"email"=>$dataFromUser['email'],
						"usertype"=>3,
						"creation_date"=>date("Y-m-d H:i:s"),
						"status"=>0
						);
			$result=$db->insert('users',$data);
			$data = array();
			$data['tables']='users';
			$data['columns']=array('users.id');
			$data['conditions']=array("email"=>$dataFromUser['email']);
			$result = $db->select($data);
			$userId =$result->fetch(PDO::FETCH_NUM);
			
			$data['tables']='company_details';
			$data['columns']=array('company_details.id');
			$data['conditions']=array("company_name"=>$dataFromUser['companyName']);
			$result = $db->select($data);
			$companyId =$result->fetch(PDO::FETCH_NUM);
			
			$data = array(
						"user_id"=>$userId[0],
						"contact_number"=>$dataFromUser['contactNumber'],
						"company_id"=>$companyId[0],
						"gender"=>$dataFromUser['gender']
						);
			$result=$db->insert('employer_details',$data);
			return $result;
			//var_dump($);
			if ($result){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		
	}
}//Class end here
?>

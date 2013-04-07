<?php 
//ini-set("display_errors","1");
require_once'library/database/usage.class.php';
require_once'library/serverValidation.class.php';
class registrationModel 
{
	/*This function calls methods to validate new employer registration data
	 * and inserts the data using users class.
	 */
	function inject($data)
	{
		
		$valid = 1;//echo $valid;die();
		$validateObj = new serverValidation();
		$valid = $validateObj->alphabeticValidation($data['firstName']);
		if($valid)
			$valid = $validateObj->alphabeticValidation($data['lastName']);
		//echo $valid;//die();
		if($valid)
			$valid = $validateObj->emailValidation($data['email']);
		if($valid)
			$valid = $validateObj->alphaNumericValidation($data['password']);
		if($valid)
			$valid = $validateObj->lengthValidator($data['password'],6);
		
		
		/**
		 * If all elements are valid insert the data
		 */
		if($valid)
		{
			$displayName=$data['firstName']." ".$data['lastName'];
			$password=md5($data['password']);
			$obj	=	new users();
			if ($obj) {
				$obj->displayname	=	$displayName;
				$obj->email			=	$data['email'];
				$obj->userType		=	3;
				$obj->creation_date	=	date("Y-m-d H:i:s");
				$obj->status		=	'0';
				$obj->password      =   md5($data['password']);
				$obj->create();
				return true;
			}
			else {
				//could not create connection
				//redirect to registration page
				return false;
			}
		}
		else
		{
			echo "Validation Failed";
		}
	}
}//Class end here
?>

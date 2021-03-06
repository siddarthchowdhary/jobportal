<?php
/* @author 		: Ashwani Singh
 * @date   		: 08-04-2013
 * @description : Admin Home Model 
 * @module		: Admin 
 * @modified on : 
*/

class AdminHomeModel
{	
	private $_email;
	private $_password;
	
	#method to obtain connection from mysql database
	public function dbConnect()
	{	$config=array();
		require_once(PDO);									#including CXPDO class
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO
		$db = dbclass::instance($config);					#calling static instance() method of dbclass 
															#which returns connection object	
															
		return $db;  										#returning connection object	
	}
	
	function validateUser($dataFromUser)
	{
		$db = $this->dbConnect();
		session_start();

		$data = array();
		$data['tables'] = 'users';
		$password=md5($dataFromUser['password']);
		$email = $_SESSION['EMAIL_SESSION'];
		$data['conditions'] = array(
								"email = '$email' AND ",
								"password = '$password'"
								);
		$result = $db->select($data);
		
		if ( $result->rowCount() == 1 ) 
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function changePassword($dataFromUser)
	{
		
		$db = $this->dbConnect();
		session_start();
		$email = $_SESSION['EMAIL_SESSION'];
		$data = array("password"=>md5($dataFromUser));
		$where = array("email = '$email'");
		$result = $db->update('users',$data,$where);
		if ($result)
			return 1;
		else
			return 0;
	}

}
?>

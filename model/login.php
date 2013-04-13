<?php
class loginModel
{
	/*Documentation
	 * it just connects to the database and returns an instance of the connection 
	 * */
    public function getDatabaseHandler(){
		$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}
	/*Documentation
	 * this method is used to check if the valued that are paseed to it exiist in the database or not
	 * and respective values are passed. 
	 * */
    
	public function authenticate($arrArguements)
	{
			$db = $this->getDatabaseHandler();
			$data = array();
			$data['tables'] = 'users';
			$password=md5($arrArguements[1]);
			$data['conditions'] = array("email"=>$arrArguements[0],"password"=>$password);
			$result = $db->select($data);
			if ( $result->rowCount() == 1 ) {
					while($row = $result->fetch(PDO::FETCH_ASSOC)) {   #seesion variables are initialized here
						session_start(); 
						$_SESSION['DISPLAY_NAME_SESSION'] = $row['displayname'];
						$_SESSION['EMAIL_SESSION'] 	      = $row['email'];
						$_SESSION['USERTYPE_SESSION'] 	  =	$row['usertype'];
						$_SESSION['ID_USERS_SESSION'] 	  = $row['id'];
						$usertype = $row['usertype'];
						return $usertype;  	
					}
			} else{
				$userType = "failed";
                return $userType;

			}
	}
	
	function validateUser($dataFromUser)
	{
		$db = $this->getDatabaseHandler();
		session_start();
		//select query to check if firstname is empty
		$data = array();
		$data['tables'] = 'users';
		$password=md5($dataFromUser['password']);
		$data['conditions'] = array(
								"email"=>$_SESSION['EMAIL_SESSION'],
								"password"=>$password
								);
		$result = $db->select($data);
		if ( $result->rowCount() == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function changePassword($dataFromUser)
	{
		$db = $this->getDatabaseHandler();
		$data = array("password"=>md5($dataFromUser));
		$where = array("email"=>$_SESSION['EMAIL_SESSION']);
		$result = $db->update('users',$data,$where);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
}
?>

<?php
//require_once 'DBConnect.php';
class loginModel
{
	private $_email;
	private $_password;


	public function __construct() {
        
    }
    
    public function getDatabaseHandler(){
		$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}
	
	public function getEmail()
	{
		return $this->_email;
	} 

	public function setEmail($val="")
	{
		$this->_email=$val;
	}

	public function getPassword()
	{
		return $this->_password;
	} 

	public function setPassword($val="")
	{
		$this->_password=$val;
	}


	/*public function validateLogin()
	{
		//Array to store validation errors
		$errmsg_arr = array();
		//Validation error flag
		$errflag = false;
		
		if (!empty($this->_email) && !empty($this->_password)){
			return true;
		}

		else {
			$errflag = true;
		}

		if($errflag) {
		//$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		header("location: ../index.php");
		exit();
		}

	}*/

	public function authenticate($arrArguements)
	{
			//print_r($arrArguements);die("i am here");
			$db = $this->getDatabaseHandler();
			
			//select query to check if firstname is empty
			$data = array();
			$data['tables'] = 'users';
			$password=md5($arrArguements[1]);
			$data['conditions'] = array("email"=>$arrArguements[0],"password"=>$password);
			//print_r($data['conditions']);die;
			$result = $db->select($data);
			//var_dump($result);die;
			if ( $result->rowCount() == 1 ) {
					while($row = $result->fetch(PDO::FETCH_ASSOC)) {
						session_start(); 
						//echo '<pre>';print_r($row);die("i am here");                                        //session created here		
						//session_regenerate_id();
						$_SESSION['DISPLAY_NAME_SESSION'] 	= $row['displayname'];
						$_SESSION['EMAIL_SESSION'] 	= $row['email'];
						$_SESSION['USERTYPE_SESSION'] 	= $row['usertype'];
						$_SESSION['ID_USERS_SESSION'] 	= $row['id'];
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
		//print_r($arrArguements);die("i am here");
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
		//print_r($data['conditions']);die;
		$result = $db->select($data);
		//var_dump($result);die;
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
		//echo "<pre>";print_r($dataFromUser);die();
		//session_start();
		$db = $this->getDatabaseHandler();
		$data = array("password"=>md5($dataFromUser));
		$where = array("email"=>$_SESSION['EMAIL_SESSION']);
		$result = $db->update('users',$data,$where);
		//var_dump($result);die("updated");
		if ($result)
			return 1;
		else
			return 0;
	}
}
?>

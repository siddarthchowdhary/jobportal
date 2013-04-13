<?php
require_once 'DBConnect.php';
class registerjobseekerModel extends DBConnect
{
		public function __construct()
		{
			#constructor
		}
		
		/*public function common()
		{
			require_once 'library/pdo/pdo_config.php';
			//Include the CXPDO Class
			require_once('library/pdo/cxpdo.php');
			
			//Create/GET the instance - pass the config values
			$db = dbclass::instance($config);
			return $db;
			
		}*/
		public function check($arrArguements)
		{
			//echo "i am in check , model <pre>";
			//echo $arrArguements[0]."<br />";
			//print_r($arrArguements);die();
			//validate firstname
			$error = '';
			if($arrArguements[0] == "" ) 
			{
				$error = "error : You did not enter first name.";
			}
			elseif(strlen($arrArguements[0])<3 ) 
			{
				$error .= "<br />error : first name should be 3 characters long";
			}
			
			//validate lastname
			if($arrArguements[1] == "" ) 
			{
				$error .= "<br />error : You did not enter last name.";
			}
			elseif(strlen($arrArguements[1])<3 ) 
			{
				$error .= "<br />error : last name should be 3 characters long";
			}
			
			//validate password and confirm password
			if(strlen($arrArguements[3])<8 )
			{
				$error .= "<br />error : password should be 8 characters long";
			}
			if($arrArguements[3] != $arrArguements[4])
			{
			    $error .= "<br />error : password and confirm password dont match.!";
			}
			
			//check if email field is empty
			if($arrArguements[2] == "" ) 
			{
				$error= "error : You did not enter a email.";
			
			} //check for valid email 
			elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $arrArguements[2])) 
			{
				$error= 'error : You did not enter a valid email.';
			}
			if (strlen($error)>0)
			{
			    echo $error;
			    return  false;
			}    
			else
			{
				return  true;
			}
		}//function check ends here

	public function inject($arrValues)  //insert into database here
	{
		//print_r($arrValues);die;
		$db = $this->common();
		$password=md5($arrValues[3]);//die("$password");
		$data[] = array('password' => $password, 'displayname' => $arrValues[5],'email'=>$arrValues[2],'usertype'=>2,
		'creation_date'=>date('Y-m-d H:i:s'));
		//print_r($data);die("here");
		foreach($data as $row) {
		$result = $db->insert('users', $row);            //first arg is tablename and second is data in the array
		if ($result){
			//print 'Created row '. $db->lastInsertId(). ' in the table "users"<br />';
			return true;
		} else {
			return false;
		}
	}

	}//function  inject ends here
} //class ends here

?>

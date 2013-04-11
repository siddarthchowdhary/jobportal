<?php
/* @author 		: Ashwani Singh
 * @date   		: 03-04-2013
 * @description : Employer Management Model 
 * @module		: Admin 
 * @modified on : 05-04-2013	Added employer statistics functionality
*/
ini_set("display_errors","1");
class EmployerManagementModel
{	
	#method to obtain connection from mysql database
	public function dbConnect()
	{
		require_once(PDO);									#including CXPDO class
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO 
		
		$db = dbclass::instance($config);					#calling static instance() method of dbclass 
															#which returns connection object	
															
		return $db;  										#returning connection object	
	}
	
	#method to show employer statistics 
	function employerStatistics()									
	{  
		$db 				= $this->dbConnect();
		$data				= array();
		$data['tables']		= 'users';     									#selecting users table from database
		$data['conditions1'] = array("usertype ='3'");   					#setting condition where usertype='3'  (3=employer) 
		$data['conditions2'] = array("usertype ='3' and ","status = '0'"); 	#condition where usertype=2 and status=0 (0=active)
		
		$result1 = $db->count($data['tables'],$data['conditions1']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2'
		$result2 = $db->count($data['tables'],$data['conditions2']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2' and status = '0'
		
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);		#result containing total number of employers
		
		$row2 = $result2->fetch(PDO::FETCH_ASSOC);		#result containing number of active employers
		
		$row3 =$row1['COUNT(*)']-$row2['COUNT(*)'];		#result containing number of inactive employers
		

		$result3 = array( "TotalEmployer" 	=> $row1['COUNT(*)'],
						  "ActiveEmployer" 	=> $row2['COUNT(*)'],
						  "InactiveEmployer"=>$row3
					);
		
		return $result3;
	}
	
	#method to search employer
	function employerSearch($email)
	{   
		$db 				= $this->dbConnect();
		$data				= array();
		$data['tables']		= 'users';						#selecting users table from database
		$data['columns']= array('users.displayname','users.usertype','users.email','users.status','users.creation_date');
		$data['conditions'] = array("email ='$email'");
		$result = $db->select($data);				# query => SELECT `users`.`displayname`,`users`.`email`,`users`.`status`,`users`.`creation_date` FROM `users` WHERE email ='employer@osscube.com' )
		$row = $result->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	
	
	#method to activate employer
	function employerActivate($email)									
	{  	
		$db 				= $this->dbConnect();
		$data				= array();
		$data['tables']		= 'users';						#Updating users table from database
		$data = array("status" => "0");						#setting status = '0' (0= active)
		$where =array("email = '$email'");
		$result = $db->update('users', $data, $where);  # Query UPDATE `users`  SET `status` = '0' WHERE email = 'employer@osscube.com'
 		return $result;   
	}
	
	#method to deactivate employer
	function employerDeactivate($email)								
	{  
		$db 				= $this->dbConnect();
		$data				= array();
		$data['tables']		= 'users';						#Updating users table from database
		$data = array("status" => "1");						#setting status = '1' (1= deactive)
		$where =array("email = '$email'");
		$result = $db->update('users', $data, $where);  # Query UPDATE `users`  SET `status` = '1' WHERE email = 'employer@osscube.com'
 		return $result;
	}

	
}
?>


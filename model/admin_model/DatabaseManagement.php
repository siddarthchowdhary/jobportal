<?php
/* @author 		: Ashwani Singh
 * @date   		: 03-04-2013
 * @description : Database Management Model 
 * @module		: Admin 
 * @modified on : 
*/

class DatabaseManagementModel
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
	
	#method to add new Industry type
	public function addIndustry()									
	{  
		$db 				= $this->dbConnect();
		$data				= array(); 
		$data['tables']		= 'admin_pages';     			#selecting admin_pages table from database
		$data['columns']= array('admin_pages.content1');	#selecting coloumn content1
		$data['conditions'] = array("name ='AboutUs'");     #where name='AboutUs'  
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
		
		
	}
	
}
?>



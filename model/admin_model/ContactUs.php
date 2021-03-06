<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-2013
 * @description : Contact Us Model
 * @module		: Admin 
 * @modified on : 
*/

class ContactUsModel
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
	
	#method to show Contact us
	function showContactUs()								
	{   
		$db = $this->dbConnect();							#calling dbConnet() which returns connection object
		$data				= array(); 
		$data['tables']		= 'admin_pages';     			#selecting admin_pages table from database
		$data['columns']= array('admin_pages.content1');	#selecting coloumn content1 
		$data['conditions'] = array("name ='ContactUs'");   #where name='ContactUs'  
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
		
			
	}
	
	#method to update contact us
	function updateContactUs()								
	{   
		$contactUsNew=htmlentities($_REQUEST['contactUs']); #htmlentities will disable all html/script tags in requested data
	   
		$db = $this->dbConnect();							#calling dbConnet() which returns connection object
		//$data				= array();
		$data['tables']		= 'admin_pages';				#selecting admin_pages table from database
	
		//$data['conditions'] = array("name ='AboutUs'");
		$data = array("content1" => "$contactUsNew");       #set  content1='new about us'
 		$where = array("name = 'ContactUs'");				#where name='ContactUs'
 		


		$result = $db->update('admin_pages', $data, $where); #update query
		
		
	}

}
?>


<?php
/* @author 		: Ashwani Singh
 * @date   		: 29-03-2013
 * @description : AboutUs Model 
 * @module		: Admin 
 * @modified on : 30-03-2013
*/

class AboutUsModel
{	
	#method to obtain connection from mysql database
	public function dbConnect()
	{	$config=array();
		require_once(PDO);									#including CXPDO class
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO
		$db = dbclass::instance($config);					#calling static instance() method of dbclass 
															#which returns connection object	
															
		return $db;  										#returning connection object	
	}
	
	#Method to show About us
	function showAboutUs()									
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
	
	#Method to update about us
	function updateAboutUs()								
	{  
		$aboutUsNew=htmlentities($_REQUEST['aboutUs']);     #htmlentities will disable all html/script tags in requested data
	   
		$db = $this->dbConnect();							#calling dbConnet() which returns connection object
		$data				= array();
		$tables		= 'admin_pages';						#selecting admin_pages table from database
	
		//$data['conditions'] = array("name ='AboutUs'");
		$data = array("content1" => "$aboutUsNew");         #set  content1='new about us'
 		$where = array("name = 'AboutUs'");					#where name='AboutUs'
 		


		$result = $db->update($tables, $data, $where); 		#update query
		
		
	}

}
?>

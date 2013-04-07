<?php
/* @author 		: Ashwani Singh
 * @date   		: 31-03-2013
 * @description : Contact Us Model
 * @module		: Guest
 * @modified on : 
*/
require_once(PDO);											#including PDO class
class ContactUsModel
{
	function showContactUs()								#Method to show Contact us
	{   $config='';
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO 
	    
		$db = dbclass::instance($config);
		$data				= array(); 
		$data['tables']		= 'admin_pages';     			#selecting admin_pages table from database
		$data['columns']= array('admin_pages.content1');	#selecting coloumn content1
		$data['conditions'] = array("name ='ContactUs'");   #where name='ContactUs'  
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
		
		
	}
}
?>


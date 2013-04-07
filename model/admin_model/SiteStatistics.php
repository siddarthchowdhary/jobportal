<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : SiteStatistics Model 
 * @module		: Admin 
 * @modified on : 
*/
require_once(PDO);											#including PDO class
class SiteStatisticsModel
{
	function showStats()									#Method to show site statistics
	{   $config='';
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO 
	    $db = dbclass::instance($config);
		
	/*	$data				= array(); 
		$data['tables']		= 'admin_pages';     			#selecting admin_pages table from database
		$data['columns']= array('admin_pages.content1');	#selecting coloumn content1
		$data['conditions'] = array("name ='AboutUs'");     #where name='AboutUs'  
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
	*/	
		
	}
	/*
	function search()										#Method to show search result
	{   $config='';
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO 
		$aboutUsNew=htmlentities($_REQUEST['aboutUs']);     #htmlentities will disable all html/script tags in requested data
	   
		$db = dbclass::instance($config);
		$data				= array();
		$data['tables']		= 'admin_pages';				#selecting admin_pages table from database
	
		//$data['conditions'] = array("name ='AboutUs'");
		$data = array("content1" => "$aboutUsNew");         #set  content1='new about us'
 		$where = array("name = 'AboutUs'");					#where name='AboutUs'
 		


		$result = $db->update('admin_pages', $data, $where); #update query
		
		
	}
	*/
}
?>

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
	private $countHits;
	
	
	function showStats()									#Method to show site statistics
	{   
	 $count= 0;

	$handle = opendir(session_save_path());   
	if ($handle == false) return -1;

	while (($file = readdir($handle)) != false) {
       if (preg_match("^sess", $file)) $count++;
	}
	closedir($handle);

	return $count;
		
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

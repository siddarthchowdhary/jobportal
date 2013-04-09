<?php

require_once(PDO);
class AboutUsModel
{
	function showAboutUs()
	{   
		require_once(PDO_CONFIG);
	
		$db = dbclass::instance($config);
		$data				= array();
		$data['tables']		= 'admin_pages';
		
		$data['conditions'] = array("name ='AboutUs'");
		$data['columns']= array('admin_pages.content1');
		$result = $db->select($data);
		
//  print($result->queryString); die("here");
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			//print_r($row);
			return $row;
		}
		
		
	}

}
?>


<?php
/**
 * file_name: AboutUs.php
 * @author: Ashwani Singh
 * created_on: 22-Apr-2013
 * description:  used to manage about us.
 * functions:  showAboutUs
 * */

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
		
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
		
		
	}

}
?>


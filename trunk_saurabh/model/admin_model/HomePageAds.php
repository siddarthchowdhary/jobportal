<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-2013
 * @description : JobPortal Home Page Ads model 
 * @module		: admin
 * @updated on	: 31-03-2013
 * @todo 		: multiple ads display
*/
ini_set("display_errors","1");
class HomePageAdsModel 
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
	
	#method to show available ads
	function showAds()   									
	{
		$db = $this->dbConnect();							#calling dbConnet() which returns connection object
		$data				= array(); 
		$data['tables']		= 'myuploads';     				#selecting myuploads table from database
		$data['columns']= array('myuploads.filename');		#selecting coloumn filedata containg ads
		$data['conditions'] = array("type ='ads'");    		#where name='AboutUs'  
		$result = $db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		return $row;
 	}
	
	#method to add more adds and add file name in databases;
	public function addAds($fileName)		
	{  
		$db 				= $this->dbConnect();
		//$data				= array();
		//$data['tables']		= 'myuploads';     			#selecting admin_pages table from database
		//$data= array('filename'=>"$fileName");	#selecting coloumn name and value to insert
		//$result=$db->insert('myuploads',$data);
		
		$data = array('filename' =>"$fileName");
		$where = array('fid' =>"1");
		$result = $db->update('myuploads', $data, $where);

		
	}
	
	#method to remove ads
	public function removeAds()	
	{
		
	}
	
			
}	


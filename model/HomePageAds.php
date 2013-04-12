<?php
/* @author 		: Ashwani Singh
 * @date   		: 04-04-2013
 * @description : JobPortal Home Page Ads model 
 * @module		: admin
 * @updated on	: 
 * @todo 		: multiple ads display
*/

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
	public function showAds()   									
	{   	
		$db = $this->dbConnect();							#calling dbConnet() which returns connection object
		$data				= array(); 
		$data['tables']		= 'myuploads';     				#selecting myuploads table from database
		
		$data['columns']= array('myuploads.filename','myuploads.url');		#selecting coloumn filedata containg ads
		
		$data['conditions'] = array("type ='ads'");    		#where name='AboutUs'  
		$result = $db->select($data);		
		$row = $result->fetch(PDO::FETCH_ASSOC);
		return $row;
 	}
	
	#method to show tip of day
	function showTipOfDay()									
	{  
		$db 				= $this->dbConnect();
		$data				= array(); 
		$data['tables']		= 'admin_pages';     			#selecting admin_pages table from database
		$data['columns']= array('admin_pages.content1');	#selecting coloumn content1
		$data['conditions'] = array("name ='TipOfDay'");    #where name='TipOfDay'  
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
		
		
	}
	
	
			
}	


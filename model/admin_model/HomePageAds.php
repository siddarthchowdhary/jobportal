<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-2013
 * @description : JobPortal Home Page Ads model 
 * @module		: admin
 * @updated on	: 04-04-2013
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
	/* 
	 * methods to manage Ads 
	*/ 
	
	#method to show available ads
	function showAds()   									
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
	
	#method to add more adds and add file name in databases;
	public function addAds($adsData)		
	{  
		$db     = $this->dbConnect();										#calling dbConnet() which returns connection object
		$data   = array('filename' =>"$adsData[0]",'url'=>"$adsData[1]");	#column and value pair $adsData[0]=filename , $adsData[1]=url
		$where  = array('fid' =>"1");										#updating table where fid=1 
		$result = $db->update('myuploads', $data, $where);					#executing update query

		
	}
		
	/* 
	 * methods to manage tip of the day
	*/	
	
	#Method to show Tip Of Day
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
	
	#Method to update Tip Of Day
	function updateTipOfDay()								
	{  
		$tipOfDay=htmlentities($_REQUEST['tipOfDay']);       #htmlentities will disable all html/script tags in requested data
	   
		$db = $this->dbConnect();							 #calling dbConnet() which returns connection object
		$data				= array();
		$data['tables']		= 'admin_pages';				 #selecting admin_pages table from database
	
	
		$data = array("content1" => "$tipOfDay");            #set  content1='new top of day'
 		$where = array("name = 'TipOfDay'");				 #where name='Tip oF day'
 		
 		$result = $db->update('admin_pages', $data, $where); #update query
		
		
	}

	
	
			
}	


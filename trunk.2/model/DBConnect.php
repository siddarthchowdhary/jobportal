<?php
//@author    : Siddarth Chowdhary
//created on : 1 april 2013
//last modified on : 1 april 2013


class DBConnect{
    
    public function __construct() 
    {
        
    }
    
    public function common()
    {	$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}
}

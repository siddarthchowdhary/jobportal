<?php
ini_set("display_errors","1");
//ini_set( 'error_reporting', "E_ALL" );
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/config/constants.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/library/database/usage.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/classes/common.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/jobportal/trunk/classes/DBConnect.php');

if(isset($_REQUEST['controller']) && !empty($_REQUEST['controller'])){
      $controller =$_REQUEST['controller']; 
}else{
      $controller ='index';  //default controller
}

if(isset($_REQUEST['function']) && !empty($_REQUEST['function'])){
      $function =$_REQUEST['function']; //echo $function;die();

}else{
      $function ='landingPage';    //default function
}

//$controller=strtolower($controller);
session_start();
$fn = SITE_ROOT.'controller/'.$controller . '.php';
# Setting controller path for each user based on their USERTYPE_SESSION 

if(isset($_SESSION['EMAIL_SESSION'])) {
	if($_SESSION['USERTYPE_SESSION']=='1') {
		$fn = SITE_ROOT.'controller/admin_controller/'.$controller . '.php';
		//echo $fn;die();	  #controller path for admin
	} elseif($_SESSION['USERTYPE_SESSION']=='2') {
		$fn = SITE_ROOT.'controller/'.$controller . '.php';  #controller path for jobseeker
	} elseif($_SESSION['USERTYPE_SESSION']=='3') {
		$fn = SITE_ROOT.'controller/'.$controller . '.php';	  #controller path for employer
	} 
}	


if(file_exists($fn)){
      require_once($fn);
      $controllerClass=$controller.'Controller';//echo $controller;
      if(!method_exists($controllerClass,$function)){
          die($function .' function not found');
      }
		
      $obj=new $controllerClass;
      $obj-> $function();

}else{
      die($controller .' controller not found');
}
?>

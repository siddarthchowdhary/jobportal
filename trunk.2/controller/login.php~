<?php
class loginController extends common 
{

	function __construct(){
		
	}
	
	function authenticate()		
	{		
			$email = $_REQUEST['email'];
			$password =$_REQUEST['password'];
			$arrResult = $this->loadModel('login','authenticate',array($email,$password));
			//print_r($_SESSION);die();		
			if ($arrResult == 1) { 
				header('Location: indexMain.php?controller=AdminHome&function=display');
			}
			elseif ($arrResult == 2){
				header('Location: indexMain.php?controller=pages&function=jobsearch');			
			}
			elseif ($arrResult == 3){
				//echo "EMPLOYER HOME  PAGE";die();
				header('Location: indexMain.php?controller=resumeSearch&function=searchPanel');
			}
			else {include_once VIEW_PATH.'login_failed.php';}
	}		
}
?>

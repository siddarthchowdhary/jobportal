<?php

class indexController extends common 
{

	function __construct(){
		
	}
	
	function landingPage()		
	{		
			$arrResult=$this->loadModel('selectValues','industryType');
			$this->loadView('header.php');
			$this->loadView('home.php',$arrResult);
			$this->loadView('footer.php');
	}
		
}

?>

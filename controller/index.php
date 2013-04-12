<?php
//@Author : Team Contribution
class indexController extends common 
{
	/*Documentation
	 * This function is responsible to get the landing page.
	 * */
	function landingPage()		
	{		
			$arrResult=$this->loadModel('selectValues','industryType');
			$this->loadView('header.php');
			$this->loadView('home.php',$arrResult);
	}
		
}

?>

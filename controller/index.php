<?php
/**
 * file_name: index.php
 * @author: team
 * created_on: 22-Mar-2013
 * description:  used to get the landing page.
 * functions:  landingPage
 * inherited class: common
 * */
?>
<?php
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

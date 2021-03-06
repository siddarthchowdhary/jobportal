<?php
/* @author 		: Ashwani Singh
 * @date   		: 21-03-2013
 * @description : JobPortal Site Information Controller
 * @module		: Guest 
 * @updated on	: 31-03-2013
 * 
*/
class SiteInformationController extends common  #extends /classes/common which contains model and view loader methods
{
	#method related to About Us
	public function showAboutUs()
	{   $result=$this->loadModel('AboutUs','showAboutUs');      #loading showAboutUs() of AboutUsModel
	
		$this->loadView('AboutUs.php',$result);                     #loading AboutUs view
	}
	
	
	#methods related to Contact Us
	public function showContactUs()
	{   $result=$this->loadModel('ContactUs','showContactUs');  #loading showAboutUs() of ContactUsModel
	
		$this->loadView('ContactUs.php',$result);                   #loading ContactUs view
	}
}



<?php
/* @author 		: Ashwani Singh
 * @date   		: 21-03-2013
 * @description : JobPortal Site Information Controller
 * @module		: Admin 
 * @updated on	: 31-03-2013
 * 
*/
class SiteInformationController extends common  #extends /classes/common which contains model and view loader methods
{
	public function display()
	{   
		$this->loadView('SiteInformation');      				#loading main SiteInformation view
	}
	
	#methods related to About Us
	public function showAboutUs()
	{   $result=$this->loadModel('AboutUs','showAboutUs');      #loading showAboutUs() of admin_model/AboutUsModel
	
		$this->loadView('AboutUs',$result);                     #loading admin_view/AboutUs view
	}
	public function updateAboutUs()
	{
		$this->loadModel('AboutUs','UpdateAboutUs');			#loading showAboutUs() of admin_model/AboutUsModel
		$this->showAboutUs();
	}
	public function previewAboutUs()
	{   $result=$this->loadModel('AboutUs','showAboutUs');      #loading showAboutUs() of admin_model/AboutUsModel
	
		$this->loadView('PreviewAboutUs',$result);              #loading admin_view/PreviewAboutUs view
	}
	
	#methods related to Contact Us
	public function showContactUs()
	{   $result=$this->loadModel('ContactUs','showContactUs');  #loading showAboutUs() of admin_model/ContactUsModel
	
		$this->loadView('ContactUs',$result);                   #loading admin_view/ContactUs view
	}
	public function updateContactUs()
	{
		$this->loadModel('ContactUs','UpdateContactUs');		#loading showAboutUs() of admin_model/ContactUsModel
		$this->showContactUs();
	}
	public function previewContactUs()
	{   $result=$this->loadModel('ContactUs','showContactUs');  #loading showAboutUs() of admin_model/ContactUsModel
	
		$this->loadView('PreviewContactUs',$result);            #loading admin_view/PreviewContactUs view
	}
	
}


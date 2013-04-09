<?php
/* @author 		: Ashwani Singh
 * @date   		: 21-03-2013
 * @description : Admin home Controller
 * @module		: Admin 
 * @updated on	: 04-03-2013
 * @todo 		: add change admin password functionality
*/
class AdminHomeController extends common  #extends /classes/common which contains model and view loader methods
{
	
	#method to display admin home page
	public function display()
	{   
		$this->loadView('AdminHome');      				#loading admin home view
	}
	
	#method to change admin password
	public function changePassword()
	{  	
		echo "change password";
		
	}	
}


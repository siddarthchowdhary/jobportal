<?php
/* @author : Ashwani Singh
 * @date   : 21-03-13
 * @description : JobPortal Employer Management Controller
 * 
*/
class EmployerManagementController extends common  #extends /classes/common which contains model and view loader methods
{	
	#method to display Employer management page
	public function display()
	{
		$this->loadView('EmployerManagement');
	}
	
	#method to activate employer
	function employerActivate()									
	{  
				
	}
	
	#method to deactivate employer
	function employerDeactivate()								
	{  
		
	}

}
?>

<?php
/* @author 		: Ashwani Singh
 * @date   		: 03-04-2013
 * @description : JobPortal DB management Controller
 * @module		: Admin
 * @modified on :
*/
class DatabaseManagementController	extends common  #extends /classes/common which contains model and view loader methods
{
	#method to diaplay Database management main page
	public function display()
	{
		$this->loadView('DatabaseManagement');
	}
	
	#method to add new Industry type
	public function addIndustry()									
	{  
		$this->loadModel('DatabaseManagement','addIndustry');
	}
	
}
?>

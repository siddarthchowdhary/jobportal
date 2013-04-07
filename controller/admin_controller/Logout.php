
<?php
/* @author : Ashwani Singh
 * @date   : 30-03-13
 * @description : JobPortal Logout Controller
 * 
*/
class LogoutController extends common     # extends /classes/common which contains model and view loader methods
{
	public function logout()
	{   $status=$this->loadModel('Logout','logout');    #if logout is successful status = "true"
        if($status) {	
			$this->loadView('Logout');                  # loading logout view
	    }
	}
	
}
?>


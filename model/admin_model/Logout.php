<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-13
 * @description : Admin Logout model
 * @module		: Admin
 * 
*/
class LogoutModel      #Logout model 
{
	public function logout()
	{   
		if(isset($_SESSION['EMAIL_SESSION'])) {		  # checking if session exists
			return (session_destroy());               # returns true if session is destroyed successfully 
 	
		}
	}
	
}
?>


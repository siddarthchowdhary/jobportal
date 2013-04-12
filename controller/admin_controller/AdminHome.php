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
	
	#method to load admin password change view
	public function adminChangePassword()
	{
		$this->loadView('AdminChangePassword');
	}
	
	#method to change admin password
	public function changePassword()
	{
		//print_r($_POST);die;
		$currentPassword = strip_tags($_POST['currentPassword']);
		$newPassword 	 = strip_tags($_POST['newPassword']);
		$confirmPassword = strip_tags($_POST['confirmPassword']);
		$temp=$this->loadModel("AdminHome","validateUser",array("password"=>$currentPassword));
		
		if($temp)
		{
			if ($newPassword == $confirmPassword)
			{
				if(strlen($newPassword)>PASSWORD_LENGTH)
				{
					$temp=$this->loadModel("AdminHome","changePassword",$newPassword);
					if($temp)
					{
						echo PASSWD_CHANGE_MSG ;
					}
					else
					{
						echo PASSWD_CHANGE_FAILED_MSG ;
					}
				}
				else
				{
					echo PASSWORD_SIZE_ERROR ;
				}
			}
			else
			{
				echo PASSWORD_MISMATCH_ERROR ;
			}
		}
		else
		{
			echo WRONG_PASSWORD_ERROR ;
		}
	}	
}


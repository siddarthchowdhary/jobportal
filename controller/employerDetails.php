<?php
class employerDetailsController extends common
{
	function updateDetails()
	{
		require VIEW_PATH.'checkSession.php';
		$displayName   = strip_tags($_POST['displayName']);
		$companyName   = strip_tags($_POST['companyName']);
		$contactNumber = strip_tags($_POST['contactNumber']);
		if ($_POST['gender'] == "Female")
			$gender = 11;
		else
			$gender = 10;
		$dataFromUser = array(
							"displayName"=>"$displayName",
							"contactNumber"=>"$contactNumber",
							"companyName"=>"$companyName",
							"gender"=>"$gender");
		$result = $this->loadModel('employerDetails','updateDetails',$dataFromUser);
		
		if ($result==1)
			echo DETAILS_UPDATED_SUCCESSFULLY;
		else if($result===0)
			echo SOMETHING_WRONG_TRY_AGAIN;
		else
			print_r( $result);
	}
	
	function editDetails()
	{
		require VIEW_PATH.'checkSession.php';
		$result= $this->loadModel('employerDetails','fetchAll');
		$this->loadView("employer_view/updateEmployerDetails.php",$result);
	}
	
	function display()
	{
		require_once VIEW_PATH.'checkSession.php';
		$result = $this->loadModel('employerDetails','fetchAll'); 
		$this->loadView('employer_view/employerDetails.php',$result);
	}
	
	function changePassword()
	{
		require VIEW_PATH.'checkSession.php';
		$currentPassword = strip_tags($_POST['currentPassword']);
		$newPassword 	 = strip_tags($_POST['newPassword']);
		$confirmPassword = strip_tags($_POST['confirmPassword']);
		if($this->loadModel("login","validateUser",array("password"=>$currentPassword)))
		{
			if ($newPassword == $confirmPassword)
			{
				if(strlen($newPassword)>6)
				{
					if($this->loadModel("login","changePassword",$newPassword))
					{
						echo PASSWORD_CHANGED_SUCCESSFULLY;
					}
					else
					{
						echo SOMETHING_WRONG_TRY_AGAIN;
					}
				}
				else
				{
					echo PASSWORD_LENGTH_SHORT_ERROR;
				}
			}
			else
			{
				echo PASSWORD_MISMATCHED;
			}
		}
		else
		{
			echo WRONG_PASSWORD;
		}
	}
}

?>

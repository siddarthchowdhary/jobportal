<?php
class employerDetailsController extends common
{
	function updateDetails()
	{
		//print_r($_POST);die();
		$displayName   = strip_tags($_POST['displayName']);
		$companyName   = strip_tags($_POST['companyName']);
		$email 		   = strip_tags($_POST['email']);
		$contactNumber = strip_tags($_POST['contactNumber']);
		if ($_POST['gender'] == "Female")
			$gender = 11;
		else
			$gender = 10;
		$dataFromUser = array(
							"displayName"=>"$displayName",
							"contactNumber"=>"$contactNumber",
							"email"=>"$email",
							"companyName"=>"$companyName",
							"gender"=>"$gender");
		$result = $this->loadModel('employerDetails','updateDetails',$dataFromUser);
		
		if ($result==1)
			echo "Details Updated Successfully";
		else if($result===0)
			echo "Something Went Wrong. Try Again.";
		else
			print_r( $result);
	}
	
	function editDetails()
	{
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
						echo "Password changed successfully.";
					}
					else
					{
						echo "Something went wrong";
					}
				}
				else
				{
					echo "New Password must be atleast 6 characters long.";
				}
			}
			else
			{
				echo "Password Mismatched";
			}
		}
		else
		{
			echo "Wrong Password Entered. Try Again";
		}
	}
}

?>

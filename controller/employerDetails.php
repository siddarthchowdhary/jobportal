<?php
class employerDetailsController extends common
{
	function updateDetails()
	{
		$displayName = $_POST['displayName'];
		$companyName = $_POST['companyName'];
		$email = $_POST['email'];
		$contactNumber = $_POST['contactNumber'];
		if ($_POST['gender'] == "FEMALE")
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
		
		if ($result)
			header('location:indexMain.php?controller=employerDetails&function=display');
		else
			echo "Something went wrong";
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
		$currentPassword = $_POST['currentPassword'];
		$newPassword = $_POST['newPassword'];
		$confirmPassword = $_POST['confirmPassword'];
		if($this->loadModel("login","validateUser",array("password"=>$currentPassword)))
		{
			if ($newPassword == $confirmPassword)
			{
				if($this->loadModel("login","changePassword",$newPassword))
				{
					echo "Password Changed Successfully";
				}
				else
				{
					echo "Something went wrong";
				}
			}
		}
		else
		{
			echo "Password Mismatch";
		}
	}
}

?>

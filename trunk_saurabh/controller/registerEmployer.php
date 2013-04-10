<?php 
/*
 * @fileName: registerEmployer.php
 * @author: saurabh agarwal
 * @created_on: 15/March/2013
 * @className: registerEmployerController
 * @functionName: newuser,registrationProcess
 * @description: this controller register new employer*/

class registerEmployerController extends common
{
	function registrationProcess()
	{
		if($_POST['captcha']==$_SESSION['captcha'])//checking if captcha is correct
		{
			$firstName       = strip_tags($_POST['firstName']);
			$lastName        = strip_tags($_POST['lastName']);
			$email           = strip_tags($_POST['email']);
			$password        = strip_tags($_POST['password']);
			$confirmPassword = strip_tags($_POST['confirmPassword']);
			$companyName     = strip_tags($_POST['companyName']);
			$contactNumber   = strip_tags($_POST['contactNumber']);
			
			if($_POST['gender'] == "Female")
			{
				$gender = 11;
			}
			else
			{
				$gender = 10;
			}
			$displayName=$firstName." ".$lastName;
			
			$data = array(
						"displayName"=>"$displayName",
						"email"=>"$email",
						"password"=>"$password",
						"companyName"=>"$companyName",
						"contactNumber"=>"$contactNumber",
						"gender"=>"$gender"
						);
			if($password == $confirmPassword)
			{
				$validError = $this->loadModel('registerEmployer','validate',$data);
				
				if(empty($validError))
				{
					$result = $this->loadModel('registerEmployer','inject',$data);
					
					if($result)
					{
						echo "Sucessfuly Registered.";
						//echo "Activation Mail will be sent when implemented.";
					}
					else
					{
						echo "Something went wrong";
					}
				}
				//in case of validation failed
				else
				{
					foreach ($validError as $key => $val) 
					{
						echo $val.'   ';
					}
				}
			}
			else
			{
				echo "Password Mismatch. Try Again!";
			}
		}//captcha check ends here
		else
		{
			echo "Captcha Fail. Try Again.";
		}
	}//function ends here
}//class ends here

?>

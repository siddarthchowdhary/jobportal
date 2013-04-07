<?php 
class registerEmployerController extends common
{
	function newuser()   #not required now delete it
	{
		$this->loadView('employer_view/registerEmployer.php');
		//echo 'emplyer_registration';
		//$this->loadView('footer.php');
	}
	
	function registrationProcess()
	{
		$firstName=strip_tags($_POST['firstName']);
		$lastName=strip_tags($_POST['lastName']);
		$email=strip_tags($_POST['email']);
		$password=strip_tags($_POST['password']);
		$confirmPassword=strip_tags($_POST['confirmPassword']);
		$companyName=strip_tags($_POST['companyName']);
		$contactNumber=strip_tags($_POST['contactNumber']);
		if(strip_tags($_POST['gender']) == "FEMALE")
		{
			$gender = 11;
		}
		else
		{
			$gender = 10;
		}
		$data = array(
						"firstName"=>"$firstName",
						"lastName"=>"$lastName",
						"email"=>"$email",
						"password"=>"$password",
						"companyName"=>"$companyName",
						"contactNumber"=>"$contactNumber",
						"gender"=>"$gender"
					);
		if($password == $confirmPassword) {
			$boolRes = $this->loadModel('registerEmployer','inject',$data);
			//var_dump($boolRes);
			if($boolRes) {
				echo 'Sucessfuly Registered';
			} else {
				echo 'Oops There was some problem.';
			}
		}
	}
}

?>

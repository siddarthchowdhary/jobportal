<?php
class updateEmployerDetailsController extends common
{
	function updateDetails()
	{
		$firstname = $_POST['firstName'];
		$lastname = $_POST['lastName'];
		$email = $_POST['email'];
		$companyName = $_POST['companyName'];
		$contactNumber = $_POST['contactNumber'];
		
		$dataFromUser = array(
							"firstName"=>"$firstname",
							"lastName"=>"$lastname",
							"email"=>"$email",
							"companyName"=>"$companyName",
							"contactNumber"=>"$contactNumber");
		echo"<pre>";
		print_r($dataFromUser);
		
		$result = $this->loadModel('updateEmployerDetails','fetchDetails',$dataFromUser);
	}
	function fetchDetails()
	{
		/*$firstname = $_POST['firstName'];
		$lastname = $_POST['lastName'];
		$email = $_POST['email'];
		$companyName = $_POST['companyName'];
		$contactNumber = $_POST['contactNumber'];
		
		$dataFromUser = array(
							"firstName"=>"$firstname",
							"lastName"=>"$lastname",
							"email"=>"$email",
							"companyName"=>"$companyName",
							"contactNumber"=>"$contactNumber");
		echo"<pre>";
		print_r($dataFromUser);
		
		$result = $this->loadModel('updateEmployerDetails','fetchDetails',$dataFromUser);
		*/
		
		$result= $this->loadModel('updateEmployerDetails','fetchAll');
		echo "<pre>";
		print_r($result) ; die("in fetch details");
		
	}
}

?>

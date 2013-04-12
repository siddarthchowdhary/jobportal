<?php
class mailController extends common
{
	function validateEmail()
	{
		//print_r($_GET);die;
		$data = array(
					"user_id"=>$_GET['user_id'],
					"validation_string"=>$_GET['validation_string']
					);
		$result = $this->loadModel('mail','validateEmail',$data);
		//print_r($result);die;
		if($result)
		{	//echo "Your email validated successfully..";
			$msg="Your email validated successfully..";
			//sleep(10);echo "here";
			$this->loadView('emailValidationSuccess.php',$msg);
		}	
		else
			print_r($result);
	}
}
?>

<?php
/**
 * file_name: createAccount.php
 * @author: Saurabh Agarwal
 * created_on: 22-Apr-2013
 * description:  used to send mail to newly registred user.
 * functions:  validateEmail
 * inherited class: common
 * */
?>
<?php
class mailController extends common
{
	function validateEmail()
	{
		$data = array(
					"user_id"=>$_GET['user_id'],
					"validation_string"=>$_GET['validation_string']
					);
		$result = $this->loadModel('mail','validateEmail',$data);
		if($result)
		{	$msg= MAIL_VALIDATED_SUCCESS;
			$this->loadView('emailValidationSuccess.php',$msg);
		}	
		else
			print_r($result);
	}
}
?>

<?php

//@author    :  Siddarth Chowdhary
//created on :  15 march 2013
class registerjobseekerController extends common
{
		/*Documentation-
		 * This function is for jobseeker registration.
		 * It get the values from the form and then creates an array.
		 * After that the values are send to a model function for validation.
		 * If the validation are passed they are inserted into the database.
		 * Result is displayed accordingly.
		 * */
		public function verify()
		{
			session_start();
			if($_REQUEST['captcha'] == $_SESSION['captcha']) {  #captcha condition successful
				$firstname			=	strip_tags(trim($_REQUEST['firstname'])); 
				$lastname			=	strip_tags(trim($_REQUEST['lastname']));
				$email				=	strip_tags(trim($_REQUEST['email']));
				$password			=	strip_tags(trim($_REQUEST['password']));
				$confirmPassword	=	strip_tags(trim($_REQUEST['confirmPassword']));
				$displayname		=	$firstname. " " .$lastname;
				$arrInfo 			=	array("firstname"=>$firstname,"lastname"=>$lastname,
										"email"=>$email,"password"=>$password,
										"confirmPassword"=>$confirmPassword,
										"displayname"=>$displayname);
				$boolResult			=	$this->loadModel('registerjobseeker','validate',$arrInfo);
				if (empty($boolResult)){
					$data		=	$this->loadModel('registerjobseeker','inject',$arrInfo);
					if(!empty($data)){
							echo "Registration Successful. ";
							$mailFlag = @$this->loadModel('mail','sendMailTO',$result);
							echo $mailFlag;
							
					} else{
							echo "Oops Something went wrong!!Please Try Again..";
					}
				} else{
						foreach ($boolResult as $key => $val) {
								echo $val.'   ';
						}
				}
			} else {       #captcha unsuccessfull
				if($_REQUEST['captcha']!='') {     #empty condition
					echo "CATCHA CHECK FAIL";
				}
			}
		}#function verify ends here
}
?>

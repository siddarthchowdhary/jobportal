<?php

//@author    :  Siddarth Chowdhary
//created on :  15 march 2013

class registerjobseekerController extends common
{
		public function __construct()
		{
			
		}

		public function verify()
		{
			session_start();
			if($_REQUEST['captcha'] == $_SESSION['captcha']) {  //captcha condition successful
				$firstname			=	trim($_REQUEST['firstname']); 
				$lastname			=	trim($_REQUEST['lastname']);
				$email				=	trim($_REQUEST['email']);
				$password			=	trim($_REQUEST['password']);
				$confirmPassword	=	trim($_REQUEST['confirmPassword']);
				$displayname		=	$firstname. " " .$lastname;
				$arrInfo 			=	array($firstname,$lastname,$email,$password,$confirmPassword,$displayname);
				$boolResult			=	$this->loadModel('registerjobseeker','check',$arrInfo);
				if ($boolResult){
					// "Values validated at server also";
					$boolQuery		=	$this->loadModel('registerjobseeker','inject',$arrInfo);
					
					if($boolQuery){
							$this->loadView('registrationSuccess.php');
					}
						else{
							$this->loadView('registrationFail.php');
						}
				}
				
				else{
							//include job seeker registration again
				}
			} else {       //captcha unsuccessfull
				echo "CATCHA CHECK FAIL";
			}
		}//function verify ends here
			
	
}

?>

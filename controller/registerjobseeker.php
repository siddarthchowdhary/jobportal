<?php

//@author    :  Siddarth Chowdhary
//created on :  15 march 2013
//todo       :  add server side validations
class registerjobseekerController extends common
{
		
		public function verify()
		{
			session_start();
			if($_REQUEST['captcha'] == $_SESSION['captcha']) {  //captcha condition successful
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
					// "Values validated at server also";
					$boolQuery		=	$this->loadModel('registerjobseeker','inject',$arrInfo);
					if($boolQuery){
							echo "Registration Successful,Please Login to Continue";
					} else{
							echo "Oops Something went wrong!!Please Try Again..";
					}
				} else{
						foreach ($boolResult as $key => $val) {
								echo $val.'   ';
						}
				}
			} else {       //captcha unsuccessfull
				echo "CATCHA CHECK FAIL";
			}
		}//function verify ends here
			
	
}

?>

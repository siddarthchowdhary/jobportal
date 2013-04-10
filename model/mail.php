<?php
class mailModel
{
	function sendMailTo($data)
	{
		//return $data;
		$to='saurabh.agarwal@osscube.com';//$data['email'];//;//$_REQUEST['email'];
		$userId = $data['user_id'];
		$validationString=$data['validation_string'];
		//return $userId
		
		$body =  "VALIDATION LINK:<br/>"; //$_REQUEST['message'];
		$body .= '<a  style="color: #0000FF" href="http://localhost/jobportal/indexMain.php?controller=registerEmployer&function=validateEmail&user_id='.$userId;
		$body .= '&validation_string='.$validationString.'">Click here to validate</a>';
		//return $body;
		require("PHPMailer_5.2.0/class.phpmailer.php");// or die("here");
		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->Host = 'ssl://smtp.gmail.com:465';
		$mailer->SMTPAuth = TRUE;
		$mailer->Username = 'siddarth.testing@gmail.com';  // Change this to your gmail adress
		$mailer->Password = 'osscube.';  // Change this to your gmail password
		$mailer->From = 'siddarth.testing@gmail.com';  // This HAVE TO be your gmail adress
		$mailer->FromName = 'SAgarwal'; // This is the from name in the email, you can put anything you like here
		$mailer->isHTML(true);
		$mailer->Body = $body;
		$mailer->Subject = 'Validation Link for JOB PORTAL';
		$mailer->AddAddress($to);  // This is where you put the email adress of the person you want to mail
		$errMsg='';
		if(!$mailer->Send())
		{
			$errMsg = "Message was not sent<br/ >";
			$errMsg .=  "Mailer Error: " . $mailer->ErrorInfo;
		}
		else
		{
			$errMsg = "Message has been sent";
		}
		return $errMsg;
	}
}
?>

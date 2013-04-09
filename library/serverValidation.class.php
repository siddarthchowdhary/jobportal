<?php
class serverValidation
{
	function numericValidation($element)
	{
		if(ctype_digit($element))
		{
			return 1;
		}
		return 0;
	}
	function alphabeticValidation($element)
	{
		if(ctype_alpha($element))
		{
			return 1;
		}
		return 0;
	}
	
	
	function alphaNumericValidation($element)
	{
		if(ctype_alnum($element))
		{
		 return 1;
		 }
		 return 0;
	}
	//Method to Validate E-mail
	function emailValidation($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return 1;
		}
		return 0;
 	}
 	
	function requiredField($element)
	{
		if(empty($element))
			return 0;
		else
			return 1;
	}
	
	function lengthValidator($element,$length)
	{
		if(strlen($element)<$length)
			return 0;
		else
			return 1;
	}
	
	function dateValidator($date) #date format  should be 2013-12-31
	{
		if(preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches))
		{
			if(checkdate($matches[2], $matches[3], $matches[1]))
			{
				return 1;
			}
		}
		return 0;
	}
	
	function ageValidator($day,$month,$year)
	{
		if($this->dateValidator($day,$month,$year))
		{
			$dateOfBirth = new DateTime($year."-".$month."-".$day);
			/*$currentDate = strtotime("now");
			$eighteen = (18*365.25*24*60*60);
		
			if(($currentDate-$dateOfBirth)<$eighteen)
			{
				return 0;
			}
			return 1;*/
			//$age=floor((time() - strtotime($dateOfBirth))/31556926);
		
			//$now      = new DateTime();
			//$birthday = new DateTime('1973-04-18 09:48:00');
			$now = strtotime("now");
			$dateOfBirth = strtotime($year."-".$month."-".$day);
			$difference = $now-$dateOfBirth;
			if($difference>0)
			{
				$age = $difference/(365.25*24*60*60);
			//echo $interval->format('%y');//die();
				if($age<18)
				{
					return 0;
				}
				return 1;
			}
		}
			return "INVALID DATE";
	}
}	
?>

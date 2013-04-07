<?php
class serverValidation
{
	function numericValidation($element)
	{
		if(!ctype_digit($element))
		{
			return 0;
		}
		return 1;
	}
	function alphabeticValidation($element)
	{
		if(!ctype_alpha($element))
		{
			return 0;
		}
		return 1;
	}
	
	function alphaNumericValidation($element)
	{
		if(!ctype_alnum($element))
		{
			return 0;
		}
		return 1;
	}
	//Method to Validate E-mail
	function emailValidation($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return 0;
		}
		return 1;
 	}
 	
	function requiredField($element)
	{
		if(!empty($element))
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
	
	function dateValidator($day,$month,$year)
	{
		if(!checkdate($month,$day,$year))
		{
			return 0;
		}
		return 1;
	}
	
	function ageValidator($day,$month,$year)
	{
		$dateOfBirth = new DateTime($year."-".$month."-".$day);
		$currentDate = new DateTime('Y-m-d');
		
		if($currentDate->diff($dateOfBirth)<18)
		{
			return 0;
		}
		return 1;
	}
}	
?>

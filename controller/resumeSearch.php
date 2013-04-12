<?php

class resumeSearchController extends common
{
	/*
	 * This function shows search panel.
	 * */
	function searchPanel()
	{
		//require VIEW_PATH.'checkSession.php';
		$this->loadView("employer_view/resumeSearch.php");
	}
	function resumeSearch()
	{
		$keywords=$_POST['keyword'];
		$location=$_POST['location'];
		$skill = $_POST['skill'];
		$experience = $_POST['experience'];
		$highestEducation = $_POST['highestEducation'];
		
		$dataFromUser=array(
						"keywords"=>$keywords,
						"location"=>$location,
						"skill"=>$skill,
						"experience"=>$experience,
						"highestEducation"=>$highestEducation
						);
		$result =  $this->loadModel('resumeSearch','retrieve',$dataFromUser);
		//print_r($result);die;
				
		if ($result){
			$response = '';
			$data ='';
			$gender='';
			while (list($key, $val) = each($result)) {
				if ($val['gender'] == 10)
					$gender=MALE;
				else
					$gender=FEMALE;
					
				if(isset($_SESSION['EMAIL_SESSION']))
				{
					$data = '\''.EMAIL_EMPLOYER.$val['email'];
					$data .= '\n'.CURRENT_ADDRESS_EMPLOYER.$val['current_address'];
					$data .= '\n'.CONTACT_NUMBER.$val['contact_number'].'\'';
				}
				else
					$data = '\''.LOGIN_FIRST.'\'';
					
				$response .= '<tr><td>';
				$response .= "<br>"."<b>".DISPLAY_NAME."</b>".$val['displayname'];
				$response .= "<br>"."<b>".HIGHEST_EDUCATION."</b>".$val['highest_degree'];
				$response .= "<br>"."<b>".EXPERIENCE."</b>".$val['experience'];
				$response .= "<br>"."<b>".SKILL."</b>".$val['keyskills'];
				$response .= "<br>"."<b>".KEY_FUNCTIONAL_AREA."</b>".$val['functional_area'];
				$response .= "<br>"."<b>".GENDER_EMPLOYER."</b>".$gender;
				$response .= '<br><input type="button" value="'.VIEW_CONTACT_DETAILS.'" onclick="contactDetails('.$data.')"/>';
				$response .= '</td></tr>';
			}
		}
		else
		{
			$response = NO_JOB_FOUND;
		}
		echo $response;
	}
}
?>

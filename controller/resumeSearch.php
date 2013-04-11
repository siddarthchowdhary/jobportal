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
		
		if ($result){
			$response = '';
			while (list($key, $val) = each($result)) {
				$response .= '<tr><td>';
				$response .= "<br>"."<b>Display Name:</b>".$val['displayname'];
				$response .= "<br>"."<b>Highest Degree:</b>".$val['highest_degree'];
				$response .= "<br>"."<b>Experience:</b>".$val['experience'];
				$response .= "<br>"."<b>Keyskills:</b>".$val['keyskills'];
				$response .= "<br>"."<b>Functional Area:</b>".$val['functional_area'];
				$response .= "<br>"."<b>Gender:</b>".$val['gender'];
				$response .= "<br>"."<b>Contact Number :</b>".$val['contact_number'];
				$response .= '</td></tr>';
			}
		}
		else
		{
			$response = "No Job Found";
		}
		echo $response;
	}
}
?>

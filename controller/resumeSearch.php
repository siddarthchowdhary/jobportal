<?php

class resumeSearchController extends common
{
	/*
	 * This function shows search panel.
	 * */
	function searchPanel()
	{
		require VIEW_PATH.'checkSession.php';
		//$result = $this->loadModel("","");
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
		//var_dump($dataFromUser);die();
		
		$result =  $this->loadModel('resumeSearch','retrieve',$dataFromUser);
		
		//echo "<pre>";print_r($result);
		//var_dump($result);die();
		if ($result){
			//$this->loadView("employer_view/resumeSearchResult.php",$result);
			$response = '';
			//$response .= '<table id="datatables" class="display">';
			//$response .= '<thead>';
			//$response .= '<tr><th>Search Result</th></tr>';
			//$response .= '</thead><tbody>';
			while (list($key, $val) = each($result)) {
				$response .= '<tr><td>';
				//$response .= '<form action="indexMain.php?controller=job&function=editJob" id="frmRegisterJobSeeker" method="post">';
				$response .= "<br>"."<b>Display Name:</b>".$val['displayname'];
				$response .= "<br>"."<b>Highest Degree:</b>".$val['highest_degree'];
				$response .= "<br>"."<b>Experience:</b>".$val['experience'];
				$response .= "<br>"."<b>Keyskills:</b>".$val['keyskills'];
				$response .= "<br>"."<b>Functional Area:</b>".$val['functional_area'];
				$response .= "<br>"."<b>Gender:</b>".$val['gender'];
				$response .= "<br>"."<b>Contact Number :</b>".$val['contact_number'];
				//$response .= '<input type="hidden" name="userId" id="userId" value="'.$val['userId'].'"/>';
				//$response .= '<input type="button" value="Delete" onclick="deleteJob('.$val['id'].')"/>';
				//$response .= '</form></td></tr>';
				$response .= '</td></tr>';
			}
           // $response .= '</tbody></table>';
		}
		else
		{
			$response = "No Job Found";
		}
		echo $response;
	}
}
?>

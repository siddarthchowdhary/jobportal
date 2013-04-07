<?php
class resumeSearchController extends common
{
	function resumeSearch()
	{
		$keywords=$_POST['keyword'];
		$location=$_POST['location'];
		$skill = $_POST['skill'];
		$experience = $_POST['experience'];
		$highestEducation = $_POST['education'];
		
		$dataFromUser=array(
						"keywords"=>$keywords,
						"location"=>$location,
						"skill"=>$skill,
						"experience"=>$experience,
						"highestEducation"=>$highestEducation
						);
		///echo "<pre>";//</pre>
		//print_r($dataFromUser);
		//die("in resumeSearchController");
		$result =  $this->loadModel('resumeSearch','retrieve',$dataFromUser);
		if ($result){
			$this->loadView("employer_view/resumeSearchResult.php",$result);
		}
	}
}
?>

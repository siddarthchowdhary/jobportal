
<?php
class jobController extends common
{
	function addNewJob()
	{
		require VIEW_PATH.'checkSession.php';
		$postName = $_POST['postName'];
		$experience = $_POST['experience'];
		$dayOfLastApplying = $_POST['dayOfLastApplying'];
		$monthOfLastApplying = $_POST['monthOfLastApplying'];
		$yearOfLastApplying = $_POST['yearOfLastApplying'];
		$expectedSalary = $_POST['expectedSalary'];
		$jobDescription = $_POST['jobDescription'];
		$jobLocation = $_POST['jobLocation'];
		$jobCategory = $_POST['jobCategory'];
		$keywords = $_POST['keywords'];
		
		
		$dataFromUser = array(
							"postName"=>"$postName",
							"experience"=>"$experience",
							"dayOfLastApplying"=>"$dayOfLastApplying",
							"monthOfLastApplying"=>"$monthOfLastApplying",
							"yearOfLastApplying"=>"$yearOfLastApplying",
							"expectedSalary"=>"$expectedSalary",
							"jobDescription"=>"$jobDescription",
							"jobLocation"=>"$jobLocation",
							"jobCategory"=>"$jobCategory",
							"keywords"=>"$keywords",
							);
		$result = $this->loadModel("job","addNewJob",$dataFromUser);
		if($result==1)
			echo "Job Insertd Sucessfully";
		else
			echo "Something Went wrong type of view here";
		}
		
		function editJob()
		{
			require VIEW_PATH.'checkSession.php';
			//$jobid=$_POST['id'];   will be sent to model to fetch data for this particular id
			$condition = array("id"=>$_POST['jobId']);//will b jobId
			$result = $this->loadModel("job","fetchAll",$condition);
			$this->loadView("employer_view/editJob.php",$result);
		}
		
		function updateJob()
		{
			require VIEW_PATH.'checkSession.php';
			$postName = $_POST['postName'];
			$experience = $_POST['experience'];
			$dateOfLastApplying = $_POST['dateOfLastApplying'];
			$expectedSalary = $_POST['expectedSalary'];
			$jobDescription = $_POST['jobDescription'];
			$jobLocation = $_POST['jobLocation'];
			$jobCategory = $_POST['jobCategory'];
			$keywords = $_POST['keywords'];
			$jobId = $_POST['jobId'];
			
			$dataFromUser = array(
							"jobId"=>"$jobId",
							"postName"=>"$postName",
							"experience"=>"$experience",
							"dateOfLastApplying"=>"$dateOfLastApplying",
							"expectedSalary"=>"$expectedSalary",
							"jobDescription"=>"$jobDescription",
							"jobLocation"=>"$jobLocation",
							"jobCategory"=>"$jobCategory",
							"keywords"=>"$keywords",
							);
			//echo "<pre>";
			//print_r($dataFromUser);die("here");
			$result = $this->loadModel("job","updateJob",$dataFromUser);
			if($result==1)
				echo "Job Updated Sucessfully";
			else
				echo "Something Went wrong";
		}
		
		function deleteJob()
		{
			//echo $_POST['jobId'];die();
			require VIEW_PATH.'checkSession.php';
			$result = $this->loadModel("job","deleteJob",$_POST['jobId']);
			if($result==1)
				echo "Job Deleted Sucessfully";
			else
				echo "Something Went wrong";
		}
		
		function showAll()
		{
			//require VIEW_PATH.'checkSession.php';
			$condition = array("employer_id"=>8);//$_SESSION['ID_USERS_SESSION']);//will be coming from session
			$result = $this->loadModel("job","fetchAll",$condition);
			//var_dump($result);die("in model");
			
			$this->loadView("employer_view/viewJobs.php",$result);
		}
		
		function searchPanel()
		{
			require VIEW_PATH.'checkSession.php';
			$this->loadView("employer_view/resumeSearch.php");
		}
		
		
		
}
?>

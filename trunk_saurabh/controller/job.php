<?php
/**
 * file_name: job.php
 * @author: saurabh agarwal
 * created_on: 22-Apr-2013
 * description:  jobController used to add,edit,delete jobs
 * functions:  addNewJob,editJob,updateJob, deleteJob,showAll, searchPanel
 * inherited class: common
 * */


class jobController extends common
{
	/*
	 * This functions add new jobs
	 * */
	function addNewJob()
	{
		//print_r($_POST);die();
		require VIEW_PATH.'checkSession.php';
		$postName 			 = strip_tags($_POST['postName']);
		$experience 		 = strip_tags($_POST['experience']);
		$dayOfLastApplying 	 = strip_tags($_POST['dayOfLastApplying']);
		$monthOfLastApplying = strip_tags($_POST['monthOfLastApplying']);
		$yearOfLastApplying  = strip_tags($_POST['yearOfLastApplying']);
		$expectedSalary 	 = strip_tags($_POST['expectedSalary']);
		$jobDescription 	 = strip_tags($_POST['jobDescription']);
		$jobLocation 		 = strip_tags($_POST['jobLocation']);
		$jobCategory 		 = strip_tags($_POST['jobCategory']);
		$keywords 			 = strip_tags($_POST['keywords']);
		
		$userId				 = $_SESSION['ID_USERS_SESSION'];
		//~ echo $userId;
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
							"userId"=>"$userId"
							);
		
		$result = $this->loadModel("job","addNewJob",$dataFromUser);
		if($result==1)
			echo "Job Insertd Sucessfully";
		elseif($result === 0)
			echo "Something went wrong";
		else
			echo $result;
			//~ echo "Something Went wrong type of view here";
		}
		
		/*
		 * This functions fetch the values to edit a particular job
		 * */
		function editJob()
		{
			require VIEW_PATH.'checkSession.php';
			
			$condition = array("jobId"=>$_POST['jobId']);//will b jobId
			$result = $this->loadModel("job","fetchJobDetails",$condition);
			
			$this->loadView("employer_view/editJob.php",$result);
		}
		
		/*
		 * This function updates the job i.e. inject new data for the given jobId
		 * */
		function updateJob()
		{
			//print_r($_POST);die();
			require VIEW_PATH.'checkSession.php';
			$postName 			= strip_tags($_POST['postName']);
			$experience 		= strip_tags($_POST['experience']);
			$dateOfLastApplying = strip_tags($_POST['dateOfLastApplying']);
			$expectedSalary 	= strip_tags($_POST['expectedSalary']);
			$jobDescription 	= strip_tags($_POST['jobDescription']);
			$jobLocation 		= strip_tags($_POST['jobLocation']);
			$jobCategory 		= strip_tags($_POST['jobCategory']);
			$keywords 			= strip_tags($_POST['keywords']);
			$jobId 				= $_POST['jobId'];
			
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
			$result = $this->loadModel("job","updateJob",$dataFromUser);
			if($result==1)
				echo "Job Updated Successfully";
			else
				echo $result;
		}
		
		/*
		 * This function deletes the job using jobId
		 * */
		function deleteJob()
		{
			require VIEW_PATH.'checkSession.php';
			$result = $this->loadModel("job","deleteJob",$_POST['jobId']);
			if($result==1)
				echo "Job Deleted Sucessfully";
			else
				echo "Something Went wrong";
		}
		
		/*
		 * This function shows all the jobs posted by the employer using userid stored in session */
		function showAll()
		{
			$condition = array("user_id"=>$_SESSION['ID_USERS_SESSION']);
			$result = $this->loadModel("job","fetchAll",$condition);
			$this->loadView("employer_view/viewJobs.php",$result);
		}
		
		
}//class ends here.
?>

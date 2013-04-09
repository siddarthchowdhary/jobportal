<?php

//@author    : Siddarth Chowdhary
//created on : 25 march 2013
//last modified on : 28 march 2013

class jobsearchController extends common
{
			public function __construct()
			{
				#constructor
			}


			public function search()
			{ 
				/*
				 * Documentation
				 * In this the job search criteria is fetched and made an array out of it
				 * Then that criteria is passed to the model for searching any available jobs in partcular table.
				 * If matching jobs are found they are reurned through an array.
				 * That result is displayed to the user.
				 * */
				$keywords=$_REQUEST['keywords'];
				$job_location=$_REQUEST['location'];
				$company_name=$_REQUEST['employer'];      //company name
				$job_category=$_REQUEST['job-category'];
				$experience_required=$_REQUEST['experience'];
				$arrCriteria = array("keywords"=>$keywords,"job_location"=>$job_location,
				"company_name"=>$company_name,"job_category"=>$job_category,"experience_required"=>$experience_required);
				$result =  $this->loadModel('jobsearch','retrieve',$arrCriteria);
				$category = $this->loadModel('jobsearch','industryType');
				$arrResult = array("category"=>$category,"result"=>$result);
				if ($result){
					$this->loadView('jobseeker_view/jobSearchResults.php',$arrResult);
				} else {
					header('Location:indexMain.php?controller=pages&function=noJobsFound');
				}
			}
			
			
			public function apply()
			{
				/*Documentation
				 * Here first of all we have checked whether the user is logged in order to apply the job.
				 * If he is then we have called a model to insert data in jobs applied table with the details of user and job.
				 * */
				require VIEW_PATH.'checkSession.php';
				$job_id=$_REQUEST['job_id'];
				settype($job_id, "integer");
				$arrIds=array("job_id"=>$job_id,"user_id"=>$_SESSION['ID_USERS_SESSION']);
				$boolInject = $this->loadModel('jobsearch','inject',$arrIds);
				if ($boolInject) {
							header('Location: indexMain.php?controller=pages&function=detailsSaved');
				} else {
							header('location:indexMain.php?controller=pages&function=alreadyApplied');
				}
			}
			
}
?>

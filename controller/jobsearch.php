<?php

//@author    : Siddarth Chowdhary
//created on : 25 march 2013
//last modified on : 28 march 2013

class jobsearchController extends common
{

			public function search()
			{ 
				/*
				 * Documentation
				 * In this the job search criteria is fetched and made an array out of it
				 * Then that criteria is passed to the model for searching any available jobs in partcular table.
				 * If matching jobs are found they are reurned through an array.
				 * That result is displayed to the user.
				 * */				 
				$keywords=strip_tags($_REQUEST['keywords']);
				$job_location=strip_tags($_REQUEST['location']);
				$company_name=strip_tags($_REQUEST['employer']);     
				$job_category=strip_tags($_REQUEST['job-category']);
				$experience_required=strip_tags($_REQUEST['experience']);
				$arrCriteria = array("keywords"=>$keywords,"job_location"=>$job_location,
				"company_name"=>$company_name,"job_category"=>$job_category,"experience_required"=>$experience_required);
				//~ print_r($arrCriteria);die("here");
				$result =  $this->loadModel('jobsearch','retrieve',$arrCriteria);
				$category = $this->loadModel('jobsearch','industryType');
				$arrResult = array("category"=>$category,"result"=>$result);
				
				if ($result){
					$this->loadView('jobseeker_view/jobSearchResults.php',$arrResult);
				} else {
					echo "<span style='color:red;'><b>Result :</b>No jobs found regarding this criteria please search with some other value</span>";
				}
			}
			
			
			public function apply()
			{
				/*Documentation
				 * Here first of all we have checked whether the user is logged in order to apply the job.
				 * If he is then we have called a model to insert data in jobs applied table with the details of user and job.
				 * */
				 if ($_SESSION['ID_USERS_SESSION']=='') {
						echo "<span style='color:red;'>You need to login before applying for this job.</span>";
						return;
				 }
				require VIEW_PATH.'checkSession.php';
				$job_id=$_REQUEST['job_id'];
				settype($job_id, "integer");
				$arrIds=array("job_id"=>$job_id,"user_id"=>$_SESSION['ID_USERS_SESSION']);
				$boolInject = $this->loadModel('jobsearch','inject',$arrIds);
				if ($boolInject) {
							echo "<span style='color:green;'><b>Result :</b>Your Details have been Saved</span>";
				} else {
							echo "<span style='color:red;'><b>Result :</b>You may have already applied for the job or it might have expired</span>";
				}
			}
			
			public function searchguest()
			{
				//~ die("here");
				/*create a view like jobsearch like previous one and rest functionality like above*/
				$keywords=strip_tags($_REQUEST['keywords']);
				$job_location=strip_tags($_REQUEST['location']);
				$company_name=strip_tags($_REQUEST['employer']);     
				$job_category=strip_tags($_REQUEST['job-category']);
				$experience_required=strip_tags($_REQUEST['experience']);
				$arrCriteria = array("keywords"=>$keywords,"job_location"=>$job_location,
				"company_name"=>$company_name,"job_category"=>$job_category,"experience_required"=>$experience_required);
				//~ print_r($arrCriteria);die("here");
				$result =  $this->loadModel('jobsearch','retrieve',$arrCriteria);
				$category = $this->loadModel('jobsearch','industryType');
				$arrResult = array("category"=>$category,"result"=>$result);
				//~ echo '<pre>';print_r($arrResult);die("here");
				$this->loadView('jobseeker_view/jobSearchResultsGuest.php',$arrResult);
			}
			
}
?>

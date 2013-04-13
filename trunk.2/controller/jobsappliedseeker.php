<?php

//@author    : Siddarth Chowdhary
//created on : 1 April 2013
//last modified on : 1 April 2013
//indexMain.php?controller=jobsappliedseeker&function=retrieve

class jobsappliedseekerController extends common
{
	public function __construct()
	{
		#constructor
	}


	public function retrieve()
	{
		/*Documentation
		 * Here we have checked whether the session is active.
		 * if it is then we have made a query to search for the jobs applied by user in the particular tables.
		 * if there are jobs the particular jobs are shown to user for which he/she has applied.
		 * else no jobs applied view is shown
		 * */
		require VIEW_PATH.'checkSession.php';
		$arrResult = $this->loadModel('jobsappliedseeker','retrieve',$_SESSION['ID_USERS_SESSION']);
		if (!empty($arrResult)) {
			$this->loadView('jobseeker_view/jobsAppliedBySeeker.php',$arrResult);
		} else {
			header('location:indexMain.php?controller=pages&function=noJobsApplied');
		}
	}
	
}

<?php
//@fileName: jobsappliedseeker.php
//@author    : Siddarth Chowdhary
//created on : 1 April 2013
//last modified on : 1 April 2013
//@description:this controller is used to retrieve jobs applied by the jobseekers.
class jobsappliedseekerController extends common
{	
	/*Documentation
	 * Here we have checked whether the session is active.
	 * if it is then we have made a query to search for the jobs applied by user in the particular tables.
	 * if there are jobs the particular jobs are shown to user for which he/she has applied.
	 * else no jobs applied view is shown
	* */
	public function retrieve()
	{
		require VIEW_PATH.'checkSession.php';
		$arrResult = $this->loadModel('jobsappliedseeker','retrieve',$_SESSION['ID_USERS_SESSION']);
		if (!empty($arrResult)) {
			$this->loadView('jobseeker_view/jobsAppliedBySeeker.php',$arrResult);
		} else {
			header('location:indexMain.php?controller=pages&function=noJobsApplied');
		}
	}
	
}

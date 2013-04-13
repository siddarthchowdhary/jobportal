<?php
//@author    :  Siddarth Chowdhary
//created on :  28 march 2013


class pagesController extends common 
{
	#this controller is used to navigate between pages

	function createaccount()
	{
		$this->loadView('createAccount.php');
	}
	
	function jobsearch()
	{
		$arrResult=$this->loadModel('selectValues','industryType');
		$this->loadView('jobseeker_view/jobSearch.php',$arrResult);
	}
	
	function accessDenied()
	{
		$this->loadView('access_denied.php');
	}
	
	function updatePersonal()
	{
		require VIEW_PATH.'checkSession.php';
		$arrPersonal=$this->loadModel('initialupdate','personal');
		$this->loadView('jobseeker_view/updatePersonal.php',$arrPersonal);
	}
	
	function updateProfessional()
	{
		require VIEW_PATH.'checkSession.php';	
		$arrProfessional=$this->loadModel('initialupdate','professional');
		if(!empty($arrProfessional)) {
			$this->loadView('jobseeker_view/updateProfessional.php',$arrProfessional);
	    } else {
			$this->loadView('jobseeker_view/updateProfessional.php');
		}
	}
	
	function updateEducational()
	{
		require VIEW_PATH.'checkSession.php';
		$arrEducational=$this->loadModel('initialupdate','educational');
		if(!empty($arrEducational)) {
			$this->loadView('jobseeker_view/updateEducational.php',$arrEducational);
	    } else {
			$this->loadView('jobseeker_view/updateEducational.php');
		}
	}
	
	function detailsSaved()
    {
        $this->loadView('jobseeker_view/detailsSaved.php');
    }
    
    function detailsNotSaved()
    {
        $this->loadView('jobseeker_view/detailsNotSaved.php');
    }
    
    function extensionProblem()
    {
        $this->loadView('jobseeker_view/extensionProblem.php');
    }
    
    
    function noJobsFound()
    {
		$this->loadView('jobseeker_view/noJobsFound.php');
	}
	
	function alreadyApplied()
    {
		$this->loadView('jobseeker_view/alreadyApplied.php');
	}
	
	function noJobsApplied()
	{
		$this->loadView('jobseeker_view/noJobsApplied.php');
	}
	
	function faq()
	{
		$this->loadView('faq.php');
	}
	function faqEmployer()
	{
		$this->loadView('employer_view/faqEmployer.php');
	}
		
}

?>

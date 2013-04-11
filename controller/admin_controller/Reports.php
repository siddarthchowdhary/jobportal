<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : JobPortal Reports Controller
 * @module		: Admin
 * @modified on	:
*/
class ReportsController extends common  							#extends /classes/common which contains model and view loader methods
{
	public function display()
	{
		$this->loadView('ReportsMain');      						#loading main Reports view
	}
	
	#Site statistics methods
	public function siteStatistics()
	{   
		$result=$this->loadModel('SiteStatistics','showStats');  	#calling showStats() of admin_model/SiteStatisticsModel
	
		$this->loadView('SiteStatistics',$result);                  #loading admin_view/JobseekerReports view
	}
	
	#JobSeeker Reports methods
	public function jobseekerReports()
	{   
		$result=$this->loadModel('Reports','showJobseekerStats');  	#calling showStats() of admin_model/JobseekerReportsModel
	
		$this->loadView('JobseekerReports',$result);                #loading admin_view/JobseekerReports view
	}
	
	#Employer Reports methods
	public function employerReports()
	{   
		$result=$this->loadModel('Reports','showEmployerStats');  	#calling  showStats() of admin_model/JobseekerReportsModel
	
		$this->loadView('EmployerReports',$result);                  #loading admin_view/JobseekerReports view
	}
	
	#Employer Reports methods
	public function jobStats()
	{   
		$result=$this->loadModel('Reports','showEmployerStats');  	#calling  showStats() of admin_model/JobseekerReportsModel
	
		$response  = "<p>".JOBS_TOTAL.$result['TotalJobs']."</p>";
		$response .="<p>".JOBS_ACTIVE.$result['ActiveJobs']."</p>";
		$response .="<p>".JOBS_INACTIVE.$result['InactiveJobs']."</p>";
		echo $response;
	}
	
	
	
	#Job Reports methods
	public function jobReports()
	{   
		$result=$this->loadModel('Reports','showJobStats'); 		#calling showStats() of admin_model/JobseekerReportsModel
	
		$this->loadView('JobReports',$result);           		    #loading admin_view/JobReports view
	}
	
	public function jobReportsSearch()
	{   
				$keywords	  		 = $_REQUEST['keywords'];
				$job_location 		 = $_REQUEST['location'];
				$company_name 		 = $_REQUEST['employer'];      //company name
				$job_category 	   	 = $_REQUEST['job-category'];
				$experience_required = $_REQUEST['experience'];
				//creating the array for processing
				$arrCriteria = array("keywords"=>$keywords,"job_location"=>$job_location,
				"company_name"=>$company_name,"job_category"=>$job_category,"experience_required"=>$experience_required);
				$result =  $this->loadModel('Reports','jobReports',$arrCriteria);
				//echo "<pre>from controller<br>";
				if ($result){
					
					echo "<b> Number of jobs: ".$result['row_count'];
				//	$this->loadView('JobReportsSearch',$result);		#loading admin_view/JobReportsSearch view
				} else {
					$result= JOB_NOT_FOUND_MSG;
					echo $result;
				//	$this->loadView('JobReportsSearch',$result);
				}		
		
				
	}
	
	
}
?>

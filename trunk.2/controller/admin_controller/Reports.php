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
		$this->loadView('prince');      						#loading main Reports view
	}
	
	#Site statistics methods
	public function siteStatistics()
	{   $result=$this->loadModel('SiteStatistics','showStats');  	#calling showStats() of admin_model/SiteStatisticsModel
	
		$this->loadView('SiteStatistics',$result);                  #loading admin_view/JobseekerReports view
	}
	
	#JobSeeker Reports methods
	public function jobseekerReports()
	{   $result=$this->loadModel('JobseekerReports','showStats');  	#calling showStats() of admin_model/JobseekerReportsModel
	
		$this->loadView('JobseekerReports',$result);                #loading admin_view/JobseekerReports view
	}
	
	#Employer Reports methods
	public function employerReports()
	{   $result=$this->loadModel('EmployerReports','showStats');  	#calling  showStats() of admin_model/JobseekerReportsModel
	
		$this->loadView('EmployerReports',$result);                 #loading admin_view/JobseekerReports view
	}
	
	#Job Reports methods
	public function jobReports()
	{   $result=$this->loadModel('JobReports','showStats');  		#calling showStats() of admin_model/JobseekerReportsModel
	
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
				$result =  $this->loadModel('JobReports','search',$arrCriteria);
				//echo "<pre>from controller<br>";
				if ($result){
					
			//		print_r($result);
					$this->loadView('JobReportsSearch',$result);		#loading admin_view/JobReportsSearch view
				} else {
					$result='<br>no jobs found regarding this criteria please try with some other criteria type of view';
					$this->loadView('JobReportsSearch',$result);
				}		
		
				
	}
}
?>

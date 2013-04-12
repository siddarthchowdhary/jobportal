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
		$result=$this->loadModel('Reports','showJobStats');  	#calling  showStats() of admin_model/JobseekerReportsModel
	
		$response  = "<p>".JOBS_TOTAL.$result['TotalJobs']."</p>";
		$response .="<p>".JOBS_ACTIVE.$result['ActiveJobs']."</p>";
		$response .="<p>".JOBS_INACTIVE.$result['InactiveJobs']."</p>";
		echo $response;
	}
	
	
	
	#Job Reports methods
	public function jobReports()
	{   
		$result=$this->loadModel('Reports','jobReportsForm'); 		#calling showStats() of admin_model/JobseekerReportsModel
	
		$this->loadView('JobReports',$result);           		    #loading admin_view/JobReports view
	}
	
	public function jobReportsSearch()
	{   
			$validInput='true';					  # flag to check validity of input values
			$invalidInputMsg="";                  # invalid input message
				
			$keywords	  		 = htmlentities($_REQUEST['keywords']);
			$job_location 		 = $_REQUEST['location'];
			$company_name 		 = $_REQUEST['employer'];      //company name
			$job_category 	   	 = $_REQUEST['job-category'];
			$experience_required = $_REQUEST['experience'];
				
			if(!empty($job_location)) {	  			#checking if field is empty or not
					#validating job location  min 3 max 20 characters 	
				if (!eregi('^[A-Za-z]{3,20}$',$job_location )) {
					$invalidInputMsg.= INVALID_JOB_LOCATION_ERROR."<br>";
					$validInput='false';
				}
			}	
				
			if(!empty($experience_required)) {		#checking if field is empty or not		
				#validating experience required  min 3 max 20 characters
				if(!eregi('^[0-9 ]$',$experience_required )) {
					$invalidInputMsg.= INVALID_EXPERIENCE_ERROR."<br>";
					$validInput='false';					
				}	
			}
			
			
			
			if($validInput == 'true')      #Enter only when input if valid
			{
				//creating the array for processing
				$arrCriteria = array("keywords"=>$keywords,"job_location"=>$job_location,
				"company_name"=>$company_name,"job_category"=>$job_category,"experience_required"=>$experience_required);
				$result =  $this->loadModel('Reports','jobReports',$arrCriteria);
		
				if ($result){
					
					echo "<b>".NUMBER_OF_JOBS.$result['row_count'];
				
				} else {
					$result= JOB_NOT_FOUND_MSG;
					echo $result;
		
				}		
		
			} else {
				echo $invalidInputMsg.PLEASE_ENTER_VALID_DATA;    #sending invalid input msg to user
			}		
	}
	
	
}
?>

<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : Reports Model 
 * @module		: Admin 
 * @modified on : 10-04-2013 jobseeker report functionality added
 * @todo		:
*/
require_once(ADMIN_MODEL_PATH.'SelectValues.php');
class ReportsModel extends SelectValuesModel 
{
	#method to obtain connection from mysql database
	public function dbConnect()
	{
		require_once(PDO);									#including CXPDO class
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO 
		
		$db = dbclass::instance($config);					#calling static instance() method of dbclass 
															#which returns connection object	
		
		return $db;  										#returning connection object	
	}
	
	#method to show employer statistics
	function showEmployerStats()									
	{  	    
		$db 				 = $this->dbConnect();
		$data				 = array();
		$data['tables']	     = 'users';     								#selecting users table from database
		$data['conditions1'] = array("usertype ='3'");   					#setting condition where usertype='3'  (3=employer) 
		$data['conditions2'] = array("usertype ='3' and ","status = '0'"); 	#condition where usertype=2 and status=0 (0=active)
		
		$result1 = $db->count($data['tables'],$data['conditions1']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2'
		$result2 = $db->count($data['tables'],$data['conditions2']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2' and status = '0'
		
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);		#result containing total number of employers
		
		$row2 = $result2->fetch(PDO::FETCH_ASSOC);		#result containing number of active employers
		
		$row3 =$row1['COUNT(*)']-$row2['COUNT(*)'];		#result containing number of inactive employers
		

		$result3 = array( "TotalEmployers" 		=> $row1['COUNT(*)'],
						  "ActiveEmployers" 	=> $row2['COUNT(*)'],
						  "InactiveEmployers"	=> $row3
					);
		
		return $result3;
	}
	
	#method to show Jobseeker statistics
	function showJobseekerStats()									
	{  	    
		$db 				 = $this->dbConnect();
		$data				 = array();
		$data['tables']	     = 'users';     								#selecting users table from database
		$data['conditions1'] = array("usertype ='2'");   					#setting condition where usertype='2'  (2=employer) 
		$data['conditions2'] = array("usertype ='2' and ","status = '0'"); 	#condition where usertype=2 and status=0 (0=active)
		
		$result1 = $db->count($data['tables'],$data['conditions1']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2'
		$result2 = $db->count($data['tables'],$data['conditions2']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2' and status = '0'
		
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);		#result containing total number of jobseekers
		
		$row2 = $result2->fetch(PDO::FETCH_ASSOC);		#result containing number of active jobseekers
		
		$row3 =$row1['COUNT(*)']-$row2['COUNT(*)'];		#result containing number of inactive jobseekers
		

		$result3 = array( "TotalJobseekers" 	=> $row1['COUNT(*)'],
						  "ActiveJobseekers" 	=> $row2['COUNT(*)'],
						  "InactiveJobseekers"  => $row3
					);
		
		return $result3;
	}
	
	#method to show Job statistics
	function showJobStats()									
	{  	    
		$db 				 = $this->dbConnect();
		$data				 = array();
		$data['tables']	     = 'jobs_available';     						#selecting jobs_available table from database
		$data['conditions1'] = array("status = '0'");   					#setting condition where status =0  (0=active) 
		$data['conditions2'] = array("status = '1'");
		
		
		$result1 = $db->count($data['tables'],$data['conditions1']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2'
		$result2 = $db->count($data['tables'],$data['conditions2']); #executing query SELECT COUNT(*) FROM `users` WHERE usertype ='2' and status = '0'
		
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);		#result containing number of active jobs
		
		$row2 = $result2->fetch(PDO::FETCH_ASSOC);		#result containing number of inactive jobs
		
		$row3 =$row1['COUNT(*)']+$row2['COUNT(*)'];		#result containing total number of jobs
		

		$result3 = array( "TotalJobs" 		=> $row3,
						  "ActiveJobs" 		=> $row1['COUNT(*)'],
						  "InactiveJobs"	=> $row2['COUNT(*)']
					);
		
		return $result3;
	}
	
	
	
	
	
	#method to show Employer reports
	function employerReports()										
	{   
		$aboutUsNew=htmlentities($_REQUEST['aboutUs']);     #htmlentities will disable all html/script tags in requested data
	   
		$db = $this->dbConnect();							#calling dbConnet() which returns connection object
		$data				= array();
		$data['tables']		= 'admin_pages';				#selecting admin_pages table from database
	
		//$data['conditions'] = array("name ='AboutUs'");
		$data = array("content1" => "$aboutUsNew");         #set  content1='new about us'
 		$where = array("name = 'AboutUs'");					#where name='AboutUs'
 		


		$result = $db->update('admin_pages', $data, $where); #update query
		
	}

	#method to load job reports form data
	function jobReportsForm()									
	{  	    
		$rowIndustry=$this->industryType();
		$rowCompany=$this->companyName();
		$response = array('industry_type' => $rowIndustry,'company_name'=> $rowCompany);		
		return $response;
	
	}






	#method to show search result
	function jobReports($arrCriteria)										
	{  
			
		/*documentation -
         *the array that has been passed conatins all the criteria for searching the job
         * we have specified the particular columns to be retrived
         * applied the joins -tables are:
         * jobs_available , employer_details , company_details
         * then we have checked if criteria is not empty and then created the particular query
         */
			
			
			$arrKeyword=explode(",",$arrCriteria['keywords']);

			$db = $this->dbConnect();
			$data = array();
			$data['columns'] = array("jobs_available.id","name_of_post","experience_required","job_description","job_location","job_category",
									"employer_id","company_name"
									);
			$data['tables']	= 'jobs_available';
			#join 1
			$data['joins']		= null;
		
			$data['joins'][] = array(
								'table' => 'employer_details', 
								'conditions' => array('jobs_available.employer_id' => 'employer_details.id')
								);
			#join 2		
			$data['joins'][] = array(
								'table' => 'company_details', 
								'conditions' => array('company_details.id' => 'employer_details.company_id')
								);
								
			$arrConditions=array();
			if(!empty ($arrKeyword)){
				
				foreach($arrKeyword as $value) {
					if (!empty($value))
					array_push($arrConditions,'jobs_available.keywords LIKE \'%'. $value."%' or ");
				}
			}
			
			if (!empty ($arrCriteria['job_location'])){
				array_push($arrConditions,'jobs_available.job_location= \'' . $arrCriteria['job_location'] .'\' or ');
			}
			if (!empty ($arrCriteria['job_category'])){
				array_push($arrConditions,'jobs_available.job_category= \'' . $arrCriteria['job_category'] .'\' or ');
			}
			if (!empty ($arrCriteria['company_name'])){
				array_push($arrConditions,'company_details.company_name= \'' . $arrCriteria['company_name'] .'\' or ');
			}
			if (!empty ($arrCriteria['experience_required'])){
				array_push($arrConditions,'jobs_available.experience_required <= \'' . $arrCriteria['experience_required'] .'\' or ');
			}	
			
			$count=count($arrConditions);
			if($count>0){
				$arrConditions[$count-1] = rtrim($arrConditions[$count-1], " or ");
				$data['conditions']	= $arrConditions;
				$result = $db->select($data);
				$row_count=$result->rowCount(); 						# counts number of record selected;
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$alljobs[]=$row; 
				}
				
				$alljobs['row_count']=$row_count;
				return $alljobs;
			} else {
			 return 0;
			}
				
	}
	


}
?>

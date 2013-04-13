<?php
/* @author 		: Ashwani Singh
 * @date   		: 01-04-2013
 * @description : JobReports Model 
 * @module		: Admin 
 * @modified on : 
*/

class JobReportsModel
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
	
	#method to show job statistics
	function showStats()									
	{  
	    
		$db 				= $this->dbConnect();			 #calling dbConnet() which returns connection object
		$data				= array(); 
		$data['tables']		= 'admin_pages';     			 #selecting admin_pages table from database
		$data['columns']	= array('admin_pages.content1'); #selecting coloumn content1
		$data['conditions'] = array("name ='AboutUs'");      #where name='AboutUs'  
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
	
	}
	
	#method to show search result
	function search($arrCriteria)										
	{  
			
		/*documentation -
         *the array that has been passed conatins all the criteria for searching the job
         * we have specified the particular columns to be retrived
         * applied the joins -tables are:
         * jobs_available , employer_details , company_details
         * then we have checked if criteria is not empty and then created the particular query
         */
			
			//echo 'from model <pre>';
			//print_r($arrCriteria);
			//echo "<br>4 things from jobs_available table and 1 thing(company_name) from comany_details table<br>";
			$arrKeyword=explode(",",$arrCriteria['keywords']);
			//print_r($arrKeyword);
			$db = $this->dbConnect();
			$data = array();
			$data['columns'] = array("jobs_available.id","name_of_post","experience_required","job_description","job_location","job_category",
									"employer_id","company_name"
									);
			$data['tables']	= 'jobs_available';
			//join 1
			$data['joins']		= null;
		
			$data['joins'][] = array(
								'table' => 'employer_details', 
								'conditions' => array('jobs_available.employer_id' => 'employer_details.id')
								);
			//join 2		
			$data['joins'][] = array(
								'table' => 'company_details', 
								'conditions' => array('company_details.id' => 'employer_details.company_id')
								);
								
			$arrConditions=array();
			//push where conditions in array here
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
			
			//echo "<pre>";
			//print_r($arrKeyword);//die();
			
			$count=count($arrConditions);
			if($count>0){
				$arrConditions[$count-1] = rtrim($arrConditions[$count-1], " or ");
				$data['conditions']	= $arrConditions;//array(rtrim ($test[0], "" ) => $test[0]);
				//print_r($test);die("<br>here");
				$result = $db->select($data);
				//echo $result->queryString;
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$alljobs[]=$row; 
				}
				//echo "<pre>";
				//print_r($alljobs);
				//die("i am here");
				return $alljobs;
			} else {
			 return 0;
			}
	
				
	}

}
?>

<?php

//@author    : Siddarth Chowdhary
//created on : 25 march 2013
//last modified on : 28 march 2013

class jobsearchModel
{
	
	public function __construct()
	{
		#constructor
	}
	
	public function common()
	{
		$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo_modified.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}
	
	public function retrieve($arrCriteria)
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
			$db = $this->common();
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
				if(!empty($alljobs)){
				return $alljobs;
				}
			} else {
			 return 0;
			}
	}

	public function inject($arrIds)
	{
		/*
		 * Documentation - in this function we have passed an array of user_id and job_id
		 * (not working)if the row already exits then it will not insert into db and will show that u have already applied for the job**
		 * else it will insert in jobs_applied table and return true else false
		 * */
		//echo "<pre>";var_dump($arrIds);die("i am here");
		$db =$this->common();	
		$result = $db->insert('jobs_applied', $arrIds);            //first arg is tablename and second is data in the array
		//print 'Created row '. $db->lastInsertId(). ' in the table "jobseeker_personal_details" change message';		
		if ($result){
			return true;
		} else {
			return false;
		}

	}
	
	public function industryType()
	{
		/*
		 * used it here seperately coz of pdo problem in where clause
		 * in this case i was using modified pdo class thatsy had to write function seperately here
		 * */
		$db=$this->common();
		$data				= array();
		$data['tables']		= 'master_table';
		$data['columns'] = 'codevalue';
		$data['conditions']		= array('codetype = \'industry_type\''); 
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	    $res[]=$row['codevalue'];
		}
		unset($db);
		return $res;
	}	
	
}
?>

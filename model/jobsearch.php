<?php

//@author    : Siddarth Chowdhary
//created on : 25 march 2013
//last modified on : 28 march 2013

class jobsearchModel
{
	/*Documentation
	 * method to get the database instance
	 * */
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
	/*Documentation -
	 *the array that has been passed conatins all the criteria for searching the job
	 * we have specified the particular columns to be retrived
	 * applied the joins -tables are:
	 * jobs_available , employer_details , company_details
	 * then we have checked if criteria is not empty and then created the particular query
	 */
	public function retrieve($arrCriteria)
	{
			$arrKeyword=explode(",",$arrCriteria['keywords']);
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
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$alljobs[]=$row; 
				}
				if(!empty($alljobs)){
				return $alljobs;
				}
			} else {
			 return 0;
			}
	}
		/*
		 * Documentation - in this function we have passed an array of user_id and job_id
		 * (not working)if the row already exits then it will not insert into db and will show that u have already applied for the job**
		 * else it will insert in jobs_applied table and return true else false
		 * */
		
	public function inject($arrIds)
	{
		$db =$this->common();	
		$result = $db->insert('jobs_applied', $arrIds);            //first arg is tablename and second is data in the array
		if ($result){
			return true;
		} else {
			return false;
		}

	}
	/*Documentation :
	 * used it here seperately coz of pdo problem in where clause
	 * in this case i was using modified pdo class thatsy had to write function seperately here
	 * */
		
	public function industryType()
	{
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

<?php

//@author    : Siddarth Chowdhary
//created on : 1 april 2013
//last modified on : 1 april 2013
require_once 'DBConnect.php';
class jobsappliedseekerModel extends DBConnect
{
	/*Documentation
	 * i/p id of the user
	 * o/p - jobs applied by the id of the user that is passed as arguement
	 * */
	
	public function retrieve($id)
	{
		$db = $this->common();
		$data = array();
		$data['columns'] = array(
								"jobs_available.name_of_post","jobs_available.job_location","company_details.company_name"
								);
		$data['tables']	= 'jobs_applied';
		//join 1
		$data['joins']		= null;
	
		$data['joins'][] = array(
							'table' => 'jobs_available', 
							'conditions' => array('jobs_applied.job_id'=>'jobs_available.id')
							);
		//join 2		
		$data['joins'][] = array(
							'table' => 'employer_details', 
							'conditions' => array('jobs_available.employer_id'=>'employer_details.id')
							);
							
	    //join 3
	    $data['joins'][] = array(
							'table' => 'company_details', 
							'conditions' => array('company_details.id' => 'employer_details.company_id')
							);
							
	    $data['conditions'] = array("jobs_applied.user_id"=>$id);
	    $result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$alljobs[]=$row; 
		}
		if(!empty($alljobs)){
			return $alljobs;
		}
		else return 0;	
	}
	
}

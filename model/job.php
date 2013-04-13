<?php
/**
 * file_name:job.php
 * @author: Saurabh Agarwal
 * created_on: 22-Apr-2013
 * description:  used add,edit,delete a job.
 * functions: getDatabaseHandler,addNewJob,fetchAll,updateJob,deleteJob,fetchJobDetails
 * */

class jobModel
{
	public function getDatabaseHandler(){
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}
	
	function addNewJob($dataFromUser)
	{
		$dateOfLastApplying =$dataFromUser['dateOfLastApplying'];
		$errMsg=array();
		if (require_once 'library/serverValidation.class.php')
		{
			$obj = new serverValidation();
			$tempDataHolder = '';
			$tempDataHolder = str_replace(' ','',$dataFromUser['postName']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Post name should be alphabetic only.';
			if(($obj->numericValidation($dataFromUser['experience']))==0)	
				$errMsg[]='Experience should be numeric only.';	
			
			if(($obj->dateValidator($dateOfLastApplying))==0)	
				$errMsg[]='Invalid Last Applying Date.';	
			if(($obj->numericValidation($dataFromUser['expectedSalary']))==0)	
				$errMsg[]='Salary should be numeric only.';	
			$tempDataHolder = str_replace(' ','',$dataFromUser['jobDescription']);
			$tempDataHolder = str_replace(',','',$tempDataHolder);
			$tempDataHolder = str_replace('-','',$tempDataHolder);
			$tempDataHolder = str_replace(':','',$tempDataHolder);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Invalid Job Description.';
			$tempDataHolder = str_replace(' ','',$dataFromUser['jobLocation']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Invalid Job Location.';
			$tempDataHolder = str_replace(' ','',$dataFromUser['jobCategory']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Invalid Job Category.';
			$tempDataHolder = str_replace(',','',$dataFromUser['keywords']);
			$tempDataHolder = str_replace(' ','',$tempDataHolder);
			if(($obj->alphanumericValidation($tempDataHolder))==0)
				$errMsg[]='Keywords should be alphanumeric only.';	
		}
		else
		{
			$errMsg[]="File Not Found";
		}
		
		if(empty($errMsg))
		{		
			$db = $this->getDatabaseHandler();
		
			$data = array();
			$data['tables']	= 'employer_details';
			$data['columns'] = array('employer_details.id');
			$data['conditions']=array("user_id"=>$dataFromUser['userId']);
			$result = $db->select($data);
			
			$employerId = $result->fetch(PDO::FETCH_NUM);
			
			
			$data = array(
					"name_of_post"=>$dataFromUser['postName'],
					"experience_required"=>$dataFromUser['experience'],
					"employer_id"=>$employerId[0],//will be coming from session in a way
					"date_of_job_posted"=>date("Y-m-d H:i:s"),
					"date_of_last_applying"=>$dateOfLastApplying,
					"expected_salary"=>$dataFromUser['expectedSalary'],
					"job_description"=>$dataFromUser['jobDescription'],
					"job_location"=>$dataFromUser['jobLocation'],
					"job_category"=>$dataFromUser['jobCategory'],
					"keywords"=>$dataFromUser['keywords']
					);
		
			$result=$db->insert('jobs_available',$data);
			
			if ($result)
				return 1;
			else
				return 0;
			}
			/*If validation fails*/
			else
			{
				$errString='';
				foreach ($errMsg as $key => $val) 
				{
					$errString .= $val.'  ';
				}
				return $errString;
			}
	}
	
	function fetchAll($condition)
	{
		
		$db = $this->getDatabaseHandler();
		
		$data = array();
		
		$data['tables']	= 'employer_details';
		$data['columns'] = array('employer_details.id');
		$data['conditions']=array("user_id"=>$condition['user_id']);
		$result = $db->select($data);
		
		$employerId = $result->fetch(PDO::FETCH_NUM);
		
		$data['tables']	= 'jobs_available';
		$data['columns']='';
		if($condition!='')
			$data['conditions']	= array("employer_id"=>$employerId);
		$result = $db->select($data);
		
		$arrResult = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$arrResult[] = $row;
		}
		
		return $arrResult;
	}
	
	function updateJob($dataFromUser)
	{
		
		$errMsg=array();
		if (require_once 'library/serverValidation.class.php')
		{
			$obj = new serverValidation();
			$tempDataHolder = '';
			$tempDataHolder = str_replace(' ','',$dataFromUser['postName']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Post name should be alphabetic only.';
			if(($obj->numericValidation($dataFromUser['experience']))==0)	
				$errMsg[]='Experience should be numeric only.';	
			if(($obj->numericValidation($dataFromUser['expectedSalary']))==0)	
				$errMsg[]='Salary should be numeric only.';	
			$tempDataHolder = str_replace(' ','',$dataFromUser['jobDescription']);
			$tempDataHolder = str_replace(',','',$tempDataHolder);
			$tempDataHolder = str_replace('-','',$tempDataHolder);
			$tempDataHolder = str_replace(':','',$tempDataHolder);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Invalid Job Description.';
			$tempDataHolder = str_replace(' ','',$dataFromUser['jobLocation']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Invalid Job Location.';
			$tempDataHolder = str_replace(' ','',$dataFromUser['jobCategory']);
			if(($obj->alphabeticValidation($tempDataHolder))==0)
				$errMsg[]='Invalid Job Category.';
			$tempDataHolder = str_replace(',','',$dataFromUser['keywords']);
			$tempDataHolder = str_replace(' ','',$tempDataHolder);
			if(($obj->alphanumericValidation($tempDataHolder))==0)
				$errMsg[]='Keywords should be alphanumeric only.';	
		
		}
		else
		{
			$errMsg[]="File Not Found";
		}
		
		if(empty($errMsg))
		{		
			$db = $this->getDatabaseHandler();
			$data = array(
					"name_of_post"=>$dataFromUser['postName'],
					"experience_required"=>$dataFromUser['experience'],
					"date_of_last_applying"=>$dataFromUser['dateOfLastApplying'],
					"expected_salary"=>$dataFromUser['expectedSalary'],
					"job_description"=>$dataFromUser['jobDescription'],
					"job_location"=>$dataFromUser['jobLocation'],
					"job_category"=>$dataFromUser['jobCategory'],
					"keywords"=>$dataFromUser['keywords']
					);
			$where = array("id"=>$dataFromUser['jobId']);
			$result = $db->update('jobs_available',$data,$where);
			
			if ($result)
				return 1;
			else
				return 0;
		}
		else
		{
			$errString='';
			foreach ($errMsg as $key => $val) 
			{
				$errString .= $val.'  ';
			}
			return $errString;
		}
	}//function update job ends here.
	
	function deleteJob($dataFromUser)
	{
		$db = $this->getDatabaseHandler();
		$result = $db->delete('jobs_available', array('id' => $dataFromUser));
		
		if ($result)
			return 1;
		else
			return 0;
	}
	function fetchJobDetails($dataFromUser)
	{
		$db = $this->getDatabaseHandler();
		
		$data = array();
		$data['tables']	= 'jobs_available';
		$data['conditions']=array("id"=>$dataFromUser['jobId']);
		$result = $db->select($data);
		
		$arrResult = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$arrResult[] = $row;
		}
		return $arrResult;
	
	}
}
?>

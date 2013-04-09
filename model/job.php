<?php

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
		//echo "<pre>in model";
		//print_r($dataFromUser);
		$dateOfLastApplying = $dataFromUser['yearOfLastApplying']."-".$dataFromUser['monthOfLastApplying']."-".$dataFromUser['dayOfLastApplying'];
		//echo "date:".$dateOfLastApplying;die("in model");
		$db = $this->getDatabaseHandler();
		$data = array(
					"name_of_post"=>$dataFromUser['postName'],
					"experience_required"=>$dataFromUser['experience'],
					"employer_id"=>"8",//will be coming from session
					"date_of_job_posted"=>date("Y-m-d H:i:s"),
					"date_of_last_applying"=>$dateOfLastApplying,
					"expected_salary"=>$dataFromUser['expectedSalary'],
					"job_description"=>$dataFromUser['jobDescription'],
					"job_location"=>$dataFromUser['jobLocation'],
					"job_category"=>$dataFromUser['jobCategory'],
					"keywords"=>$dataFromUser['keywords']
					);
		//~ echo "<pre>in model";
		//~ print_r($data);
		//die();
		$result=$db->insert('jobs_available',$data);
		//var_dump($result);die("here");
		if ($result)
			return 1;
		else
			return 0;
	}
	
	function fetchAll($condition='')
	{
		//echo "here";//die("asfafgd");
		$db = $this->getDatabaseHandler();
		$data = array();
		$data['tables']	= 'jobs_available';
		if($condition!='')
			$data['conditions']	= $condition;//array('id' => 5); //id will be coming from user
		$result = $db->select($data);
		//echo $result->queryString;
		//return $result->fetch(PDO::FETCH_ASSOC);
		//echo "<pre>";//</pre>
		//print_r($result->fetch(PDO::FETCH_ASSOC));
		
		$arrResult = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$arrResult[] = $row;
		}
		//echo "<pre>";
		//print_r($arrResult);
		return $arrResult;
	}
	
	function updateJob($dataFromUser)
	{
		//echo $dataFromUser['jobId'];die("here");
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
		//var_dump($result);die("updateJobdataFromUser model");
		if ($result)
			return 1;
		else
			return 0;
	}
	
	function deleteJob($dataFromUser)
	{
		$db = $this->getDatabaseHandler();
		$result = $db->delete('jobs_available', array('id' => $dataFromUser));
		//var_dump($result);
		if ($result)
			return 1;
		else
			return 0;
	}
}
?>

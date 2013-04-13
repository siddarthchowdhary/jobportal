<?php
ini_set ( 'display_errors', true );
class jobappliedModel {
	private $userId;
	private $jobId;
	
	

	/* function setName($data) {
		echo "frm model";
		echo $this->company_name = $data ['companyName'];
		echo "set";
		echo $this->website = $data ['website'];
		;
	}
	function setIndus($industry_t
ype, $key_function_area) {
		echo $this->industry_type = $industry_type;
		echo $this->key_functional_area = $key_function_area;
	}
	 function setLocation($city, $country) {
		echo $this->city = $city;
		echo $this->country = $country;
	}*/

	 function getDatabaseHandler()
    	  {
   	
        include 'library/pdo/pdo_config.php';
  	include 'library/pdo/cxpdo.php';
        $db = dbclass::instance($config);
	return $db;
       
   	 }


   function dbinsert($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobs_applied";
        echo $data['tables'];
	print_r($data1);
        
	 $this->userId=$data1['userid'];
	 $this->jobId=$data1['jobid'];
	


     	
        $data['c1'] = array("user_id"=>$data1['userid'],"date_of_applying"=>'now()',"job_id"=>$data1['jobid']);
     	
	$result = $db->insert($data['tables'],$data['c1']);
    }

    function dbdelete($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobs_applied";
        echo $data['tables'];
	print_r($data1);
        
	 $this->userId=$data1['userid'];
	 $this->jobId=$data1['jobid'];
	 $data['conditions']=array("user_id"=>$data1['userid'],"job_id"=>$data1['jobid']);
  	 
	 $result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
    
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobs_applied";
        echo $data['tables'];
	print_r($data1);
        
	 $this->userId=$data1['userid'];
	 $this->jobId=$data1['jobid'];
	 $data['c1'] = array("user_id"=>$data1['userid'],"date_of_applying"=>'now()',"job_id"=>$data1['jobid']);
     	
	
    $data['conditions']=array("user_id"=>$data1['userid'],"job_id"=>$data1['jobid']);
    $result = $db->update($data['tables'],$data['c1'],$data['conditions']);
    

    }
}
?>

<?php
ini_set ( 'display_errors', true );
class jobavailableModel {
			private $nameofpost;
		        private $jobdescp ;        
		        private $experience;         
			private $salary; 
			private $empid;

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
        $data['tables']="jobs_available";
        echo $data['tables'];
	print_r($data1);
        
			 $this->nameofpost=$data1['nameofpost'];
		         $this->jobdescp=$data1['jobdescp'] ;        
		         $this->experience=$data1['experience'];         
			 $this->salary=$data1['salary'];
			 $this->empid=$data1['empid'];


     	
        $data['columns'] = array(
			 "name_of_post"=>$data1['nameofpost'],
		         "job_description"=>$data1['jobdescp'],        
		         "experience_required"=>$data1['experience'],        
			 "expected_salary"=>$data1['salary'],
			 "employer_id"=>$data1['empid']);
     	
	$result = $db->insert($data['tables'],$data['columns']);
    }

    function dbdelete($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobs_available";
        echo $data['tables'];
	$data['conditions']=array("expected_salary"=>$data1['salary']);
  	 print_r ($data['conditions']);
	$result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobs_available";
        echo $data['tables'];
	print_r($data1);
        
			 $this->nameofpost=$data1['nameofpost'];
		         $this->jobdescp=$data1['jobdescp'] ;        
		         $this->experience=$data1['experience'];         
			 $this->salary=$data1['salary'];


     	
        $data['c1'] = array(
			 "name_of_post"=>$data1['nameofpost'],
		         "job_description"=>$data1['jobdescp'],        
		         "experience_required"=>$data1['experience'],        
			 "expected_salary"=>$data1['salary']);
     	
	
    $data['conditions']=array("expected_salary"=>$data1['salary']);
    $result = $db->update($data['tables'],$data['c1'],$data['conditions']);
    

    }
  }
	?>

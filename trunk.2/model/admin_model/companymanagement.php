<?php
ini_set ( 'display_errors', true );
class companymanagementModel {
	private $company_name;
	private $website;
	private $industry_type;
	private $key_functional_area;
	private $status;
	private $creation_date;
	private $city;
	private $country;
	private $host = "localhost";
	private $user = "root";
	private $pass = "mysql";
	private $db1 = "job_portal";

	 function setName($data) {
		echo "frm model";
		echo $this->company_name = $data ['companyName'];
		echo "set";
		echo $this->website = $data ['website'];
		;
	}
	function setIndus($industry_type, $key_function_area) {
		echo $this->industry_type = $industry_type;
		echo $this->key_functional_area = $key_function_area;
	}
	 function setLocation($city, $country) {
		echo $this->city = $city;
		echo $this->country = $country;
	}

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
        $data['tables']="company_details";
       // echo $data['tables'];
        
	 $this->company_name=$data1['companyName'];
	 $this->website=$data1['website'];
	 $this->industry_type=$data1['indus'];
	 $this->key_functional_area=$data1['fuc'];
	 //$this->status=$data1['companyName'];
	 $this->creation_date=$data1['ctdate'];
	 $this->city=$data1['city'];
	 $this->country=$data1['con'];


     	//echo $this->country;
        $data['c1'] = array("company_name"=>$data1['companyName'],
		     "website"=>$data1['website'],
		     "industry_type"=>$data1['indus'],
		     "key_functional_area"=>$data1['fuc'],
		     "city"=>$data1['city'],
		     "country"=>$data1['con']);
     	//var_dump($data['c1']);
	$result = $db->insert($data['tables'],$data['c1']);
	return "data insert successfully";
    }

    function dbdelete($data1=array())
    {
     	$db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']='company_details';
        echo $data['tables'];
        $this->company_name=$data1['companyName'];
         echo $this->company_name;
	$data['conditions']=array('company_name'=>"$this->company_name");
  	 print_r ($data['conditions']);
	$result = $db->delete($data['tables'],$data['conditions']);
	return "data deleted suucessfully";
    }
    
   function dbupdate($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']='company_details';
        echo $data['tables'];
        
	 //$this->company_name=$data1['companyName'];
	 $this->website=$data1['website'];
	 $this->industry_type=$data1['indus'];
	 $this->key_functional_area=$data1['fuc'];
	 $this->status=$data1['companyName'];
	 //$this->creation_date=$data1['ctdate'];
	 $this->city=$data1['city'];
	 //$this->country=$data1['con'];
    	 echo $this->country;
        $data['c1'] = array("website"=>$data1['website'],"industry_type"=>$data1['indus'],"key_functional_area"=>$data1['fuc'],"city"=>$data1['city']);
     var_dump($data['c1']);
    $data['conditions']=array("company_name"=>$data1['companyName']);
    $result = $db->update($data['tables'],$data['c1'],$data['conditions']);
    return "data updated suucessfully";

    }





  }
       
       
    












































?>

<?php
ini_set ( 'display_errors', true );
class employerdetailModel {
	private $userId;
	private $companyId;
	private $contactNo;
	private $gender;

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
        $data['tables']="employer_details";
        echo $data['tables'];
	print_r($data1);
         $this->userId    =$data1['userid'];
	 $this->companyId =$data1['companyid'];
	 $this->contactNo =$data1['num'];
         $this->gender    =$data1['gend'];


     	
        $data['c1'] = array(
        	"user_id"    =>$data1['userid'],
	 	"company_id" =>$data1['companyid'],
	 	"contact_number" =>$data1['num'],
         	"gender"    =>$data1['gend']);
     	
	$result = $db->insert($data['tables'],$data['c1']);
    }

    function dbdelete($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="employer_details";
        echo $data['tables'];
	print_r($data1);
	$data['conditions']=array("user_id"=>$data1['userid']);
  	 print_r ($data['conditions']);
	$result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="employer_details";
        echo $data['tables'];
	print_r($data1);
         $this->userId    =$data1['userid'];
	 $this->companyId =$data1['companyid'];
	 $this->contactNo =$data1['num'];
         $this->gender    =$data1['gend'];


     	
        $data['c1'] = array(
        	"user_id"    =>$data1['userid'],
	 	"company_id" =>$data1['companyid'],
	 	"contact_number" =>$data1['num'],
         	"gender"    =>$data1['gend']);
     	
	
    $data['conditions']=array("user_id"=>$data1['userid'] );
    $result = $db->update($data['tables'],$data['c1'],$data['conditions']);
    

    }
  }
	?>

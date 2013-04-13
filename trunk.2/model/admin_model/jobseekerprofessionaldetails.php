<?php
ini_set ( 'display_errors', true );
class jobseekerprofessionaldetailsModel {
	
				private $personalid;   
    			        private $experience; 
    			        private $keys ;
    			        private $industry ;
    				private $functionaArea;

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
        $data['tables']="jobseeker_professional_details";
        echo $data['tables'];
	print_r($data1);
        
				$this-> personalid=$data1['personalid'];   
    			        $this->experience=$data1['experience']; 
    			        $this->keys=$data1['keys'] ;
    			        $this->industry=$data1['industry'] ;
    				$this->functionaArea=$data1['functionalarea'];


     	
        $data['c1'] = array(
				'personal_id'=>$data1['personalid'],  
    			        'experience'=>$data1['experience'], 
    			        'keyskills'=>$data1['keys'],
    			        'current_industry'=>$data1['industry'],
    				'functional_area'=>$data1['functionalarea']);
     	
	$result = $db->insert($data['tables'],$data['c1']);
    }

    function dbdelete($data1=array())
    {
	
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobseeker_professional_details";
        echo $data['tables'];
	print_r($data1);
  	 
		$data['conditions']=array('personal_id'=>$data1['personalid']);
	$result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobseeker_professional_details";
        echo $data['tables'];
	print_r($data1);
        
				$this-> personalid=$data1['personalid'];   
    			        $this->experience=$data1['experience']; 
    			        $this->keys=$data1['keys'] ;
    			        $this->industry=$data1['industry'] ;
    				$this->functionaArea=$data1['functionalarea'];


     	
        $data['c1'] = array(
				'personal_id'=>$data1['personalid'],  
    			        'experience'=>$data1['experience'], 
    			        'keyskills'=>$data1['keys'],
    			        'current_industry'=>$data1['industry'],
    				'functional_area'=>$data1['functionalarea']);
     	
	
    $data['conditions']=array('personal_id'=>$data1['personalid']);
    $result = $db->update($data['tables'],$data['c1'],$data['conditions']);
    

    }
 }
?>

<?php
ini_set ( 'display_errors', true );
class mastermanagementModel {
	private $codeType;
	private $codeValue;
	
	

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
					
	public function search()
     	 {
          $user="root";
	  $pass="prince";
	   $db=new PDO('mysql:host=localhost;dbname=job_portal', $user, $pass);

           $stmt=$db->prepare("select distinct codetype from master_table");
	   $stmt->execute();
          

         	$value['company']=array();
		

       		 while( $abc=$stmt->fetch(PDO::FETCH_ASSOC))
         	 {
           	$value[]=$abc['codetype'];
		
	         }
      		 
        return $value;
   	 }
	
   


   function dbinsert($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="master_table";
         $this->codeType=$data1['select'];
	 $this->codeValue=$data1['value'];

	$data['columns'] = array("codetype"=>$data1['select'],"codevalue"=>$data1['value']);
     	
	$result = $db->insert($data['tables'],$data['columns']);
	return "data inserted successful";
    }

    function dbdelete($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="master_table";
        echo $data['tables'];
	print_r($data1);
        
	 $this->codeType=$data1['type'];
	 $this->codeValue=$data1['value'];
	


     	
         $data['conditions'] = array("codetype"=>$data1['type'],"codevalue"=>$data1['value']);
	 $result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
    
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="master_table";
        echo $data['tables'];
	print_r($data1);
        
	 $this->codeType=$data1['type'];
	 $this->codeValue=$data1['value'];
	


     	$data['columns'] = array("codevalue"=>$data1['newvalue']);
        $data['conditions'] = array("codetype"=>$data1['type'],"codevalue"=>$data1['value']);
    $result = $db->update($data['tables'],$data['columns'],$data['conditions']);
    

    }
}
?>

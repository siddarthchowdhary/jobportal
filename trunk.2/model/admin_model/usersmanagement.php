<?php
ini_set ( 'display_errors', true );
class usersmanagementModel {
	private $password;
	private $name;
	private $email;
	private $user;

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
        $data['tables']="users";
        echo $data['tables'];
	print_r($data1);
        
	 $this->password=$data1['password'];
	 $this->name=$data1['name'];
	 $this->email=$data1['email'];
	 $this->user=$data1['user'];


     	
        $data['c1'] = array("password"=>$data1['password'], "displayname"=>$data1['name'], "email"=>$data1['email'],"usertype"=>$data1['user']);
     	
	$result = $db->insert($data['tables'],$data['c1']);
    }

    function dbdelete($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="users";
        echo $data['tables'];
	print_r($data1);
	$data['conditions']=array("email"=>$data1['email']);
  	 print_r ($data['conditions']);
	$result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="users";
        echo $data['tables'];
	print_r($data1);
        
	 $this->password=$data1['password'];
	 $this->name=$data1['name'];
	 $this->email=$data1['email'];
	 $this->user=$data1['user'];


     	
        $data['c1'] = array("password"=>$data1['password'], "displayname"=>$data1['name'], "email"=>$data1['email'],"usertype"=>$data1['user']);
     	
	
    $data['conditions']=array("email"=>$data1['email'] );
    $result = $db->update($data['tables'],$data['c1'],$data['conditions']);
    

    }





  }
	







?>

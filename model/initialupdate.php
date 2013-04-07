<?php
//@author    : Siddarth Chowdhary
//created on : 28 march 2013
//last modified on : 28 march 2013

require_once 'DBConnect.php';
class initialupdateModel extends DBConnect{
    
    public function __construct() 
    {
        
    }
    
    /*public function common()
    {	$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}*/
	
	public function getPersonalId($id){
		
		$db = $this->common();
		//die("here");
		$data				= array();

		$data['tables']		= 'jobseeker_personal_details';
		$data['columns']	= array('jobseeker_personal_details.id');
		$data['joins']		= null;
		//Add the joins
		$data['joins'][] = array(
								'table' => 'users', 
								'conditions' => array('jobseeker_personal_details.user_id' => 'users.id')
								);
		$data['conditions']		= array('users.id' => $id);
		
		$result = $db->select($data);

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		//print_r($row);
		//var_dump($row['id']);die("i am here");
		return $row['id'];
		}
	
	}
	
	public function personal()
	{
		$db = $this->common();
		$data = array('tables' => 'jobseeker_personal_details');
		$data['conditions']		= array('user_id' => $_SESSION['ID_USERS_SESSION']);
	    $result = $db->select($data);
	
	    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    //print_r($row);
		    return $row;
	    }
	}
	
	public function professional()
	{
		$db = $this->common();
		$personal_id =$this->getPersonalId($_SESSION['ID_USERS_SESSION']);
		
		$data = array('tables' => 'jobseeker_professional_details');
		$data['conditions']		= array('personal_id' => $personal_id);
	    $result = $db->select($data);
		//print_r($result);die("here");
	    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    
		    if(!empty($row)){
		    //print_r($row);die("here");
		    return $row;
			} else {
			return false;	
			}
	    }
	}
	
	public function educational()
	{
		$db = $this->common();
		$personal_id =$this->getPersonalId($_SESSION['ID_USERS_SESSION']);
		
		$data = array('tables' => 'jobseeker_educational_details');
		$data['conditions']		= array('personal_id' => $personal_id);
	    $result = $db->select($data);
	
	    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    if(!empty($row)){
		    //print_r($row);die("here");
		    return $row;
			} else {
			return false;	
			}
	    }
	}
	
}

?>

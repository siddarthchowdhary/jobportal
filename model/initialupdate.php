<?php
//@fileName: initialupdate.php
//@className: initialupdateModel
//@description:this model is used to give initial details of the particular user.
//@author    : Siddarth Chowdhary
//created on : 28 march 2013
//last modified on : 8 april 2013

require_once 'DBConnect.php';
class initialupdateModel extends DBConnect{
   /*Documentation
    * i/p id of the user
    * o/p personal id the user.
    * */
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
		return $row['id'];
		}
	}
	/*Documentation
    * returns the personal details of the user that has seesion id of the user.
    * */
	public function personal()
	{
		$db = $this->common();
		$data = array('tables' => 'jobseeker_personal_details');
		$data['conditions']		= array('user_id' => $_SESSION['ID_USERS_SESSION']);
	    $result = $db->select($data);
	
	    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    return $row;
	    }
	}
	/*Documentation
    * returns the professional details of the user that has seesion id of the user.
    * */
	public function professional()
	{
		$db = $this->common();
		$personal_id =$this->getPersonalId($_SESSION['ID_USERS_SESSION']);
		
		$data = array('tables' => 'jobseeker_professional_details');
		$data['conditions']		= array('personal_id' => $personal_id);
	    $result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    
		    if(!empty($row)){
		    return $row;
			} else {
			return false;	
			}
	    }
	}
	/*Documentation
    * returns the educational details of the user that has seesion id of the user.
    * */
	public function educational()
	{
		$db = $this->common();
		$personal_id =$this->getPersonalId($_SESSION['ID_USERS_SESSION']);
		
		$data = array('tables' => 'jobseeker_educational_details');
		$data['conditions']		= array('personal_id' => $personal_id);
	    $result = $db->select($data);
	
	    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    if(!empty($row)){
		    return $row;
			} else {
			return false;	
			}
	    }
	}	
}
?>

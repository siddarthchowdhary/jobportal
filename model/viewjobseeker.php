<?php
//@fileName: viewjobseeker.php
//@className: viewjobseekerModel
//@description:this model is used to view the jobseeker details.
//@author    : Siddarth Chowdhary
//created on :  22 march 2013
//modified on:  8 april 2013
require_once 'DBConnect.php';
class viewjobseekerModel extends DBConnect
{
	/*Documentation
	 * this function is used to retrieve the personal id of the particular user id that is passed.
	 * */
	public function personal($id){
		$db = $this->common();
		$data				= array();
		
		$data['tables']		= 'jobseeker_personal_details';
		$data['columns']	= array('jobseeker_personal_details.id',
								'jobseeker_personal_details.firstname','jobseeker_personal_details.middlename',
								'jobseeker_personal_details.lastname','jobseeker_personal_details.gender',
								'jobseeker_personal_details.date_of_birth','jobseeker_personal_details.permanent_address',
								'jobseeker_personal_details.current_address','jobseeker_personal_details.current_city',
								'jobseeker_personal_details.current_state','jobseeker_personal_details.country',
								'jobseeker_personal_details.pincode','jobseeker_personal_details.contact_number');
		$data['joins']		= null;
		//Add the joins
		$data['joins'][] = array(
		'table' => 'users', 
		'conditions' => array('jobseeker_personal_details.user_id' => 'users.id')
		);
		$data['conditions']		= array('users.id' => $id);
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row;		
		}
		
	}
	/*Documentation
	 * i/p - personal id of jobseeker
	 * o/p - educational details of personal id
	 * db queries to retrieve educational details of the job seeker with id
	* */
	public function educational($id){
		
		$db = $this->common();
		$data				= array();
		
		$data['tables']		= 'jobseeker_educational_details';
		$data['columns']	= array('jobseeker_educational_details.highest_degree','jobseeker_educational_details.graduation_degree',
									'jobseeker_educational_details.post_graduation_degree','jobseeker_educational_details.PhD',
									'jobseeker_educational_details.other_degree');
									
		$data['joins']		= null;
		//Add the joins
		$data['joins'][] = array(
			'table' => 'jobseeker_personal_details', 
			'conditions' => array('jobseeker_educational_details.personal_id' =>'jobseeker_personal_details.id')
		);
		$data['conditions']		= array('jobseeker_personal_details.id' => $id);
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				return $row;
		}
	}
	/*Documentation
	 * i/p - personal id of jobseeker
	 * o/p - professional details of personal id
	 * db queries to retrieve professional details of the job seeker with id
	 * */	
	public function professional($id){
		$db = $this->common();
		$data				= array();

		$data['tables']		= 'jobseeker_professional_details';
		$data['columns']	= array('jobseeker_professional_details.experience','jobseeker_professional_details.keyskills',
									'jobseeker_professional_details.current_industry','jobseeker_professional_details.functional_area');
									
		$data['joins']		= null;
		//Add the joins
		$data['joins'][] = array(
			'table' => 'jobseeker_personal_details', 
			'conditions' => array('jobseeker_professional_details.personal_id' =>'jobseeker_personal_details.id')
		);
		$data['conditions']		= array('jobseeker_personal_details.id' => $id);
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				return $row;
		}
	}
	/*Documentation
	 * i/p - personal id of jobseeker
	 * o/p - resume details of personal id
	* */
	public function resume($id) {
		$db = $this->common();
		$data				= array();

		$data['tables']		= 'jobseeker_resume';
		$data['columns']	= array('extension','last_updated_on');
									
		$data['joins']		= null;
		//join 1
		$data['joins'][] = array(
			'table' => 'jobseeker_personal_details', 
			'conditions' => array('jobseeker_resume.personal_id' =>'jobseeker_personal_details.id')
		);
		$data['conditions']		= array('jobseeker_personal_details.id' => $id);
		$result = $db->select($data);
		$ext_db='';
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$ext_db=$row['extension'];
		$last_updated_on=$row['last_updated_on'];
		}
		$arrResume=array("extension"=>$ext_db,"last_updated_on"=>$last_updated_on);
		return $arrResume;
	}
}
?>
